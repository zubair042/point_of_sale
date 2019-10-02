<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use App\Location;
use App\Role;
use Auth;
use DB;

class Users extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission']);
    }
    
    public function index()
    {
        if (Auth::user()->user_role != 1) { //Other than Global Admin
            $account_id = Auth::user()->account_id;
            $user_detail = DB::table('users')
                        ->join('accounts',"users.account_id","=","accounts.id")
                        ->join('user_roles',"users.user_role","=","user_roles.id")
                        ->where('account_id',$account_id)
                        ->where('users.user_role', '!=' , 4)
                        ->select('users.*','accounts.account_name','user_roles.description')
                        ->get();
        }
        else{
            //$user_detail = User::all();
            $user_detail = DB::table('users')
                        ->join('accounts',"users.account_id","=","accounts.id")
                        ->join('user_roles',"users.user_role","=","user_roles.id")
                        ->where('users.user_role', '!=' , 4)
                        ->select('users.*','accounts.account_name','user_roles.description')
                        ->get();
        }
        return view('users/index', compact("user_detail")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_id = Auth::user()->account_id;
        // dd($account_id);
        if (Auth::user()->user_role == 1) { // Global Admin
            $customers = Account::all();
        }
        else{
            $customers = DB::table('accounts')
                        ->where('id', $account_id)
                        ->get();
        }

        $locations  = DB::table('locations')
                        ->where('account_id', $account_id)
                        ->get();

         $user_roles = DB::table('user_roles')
                        ->where("is_visible",1)
                        ->get();
                        
        $user_comapany_name = DB::table('users')
                        ->where("account_id", $account_id)
                        ->where('user_role', Auth::user()->user_role)
                        ->where('id',Auth::user()->id)
                        ->first();
        return view('users/add_user',compact(['customers', 'user_comapany_name',"user_roles","locations"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $users = new User;
        $users->created_by = Auth::user()->id;
        $users->account_id = $request->input('account_id');
        $users->location_id = json_encode($request->input('location_id'));
        //dd($users->location_id);
        $users->user_role = $request->input('user_role');
        $users->first_name = $request->input('first_name');
        $users->last_name = $request->input('last_name');
        $users->email = $request->input('email');
        $users->password = bcrypt($request->input('password'));
        $users->authentication = 'false';

        // $getManager = Role::where("description", "=", "Manager")->first();
        // //echo "<pre>"; print_r($getManager); exit;

        // if($request->user_role==$getManager->id){
        //     $users->authentication = false;
        // }
        // $request->session()->put('user_id',$users->id);
        // $request->session()->put('user_role',$users->user_role);
        // $request->session()->put('account_id');
        $users->save();
        return redirect('/users')->with('success',"New User created successfully"); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if (Auth::user()->user_role != 1) { // Global Admin
           $customers = DB::table('accounts')
                        ->where('id', Auth::user()->account_id)
                        ->get();

            $user_roles = DB::table('user_roles')
                        ->where("is_visible",1)
                        ->get();
        }
        else{
            $customers = Account::all();
            $user_roles = DB::table('user_roles')->get();
        }
        $locations = DB::table('locations')
                    ->where('account_id', Auth::user()->account_id)
                    ->get();
                
        $user = User::find($id);
        
        return view('users/edit_user', compact(['user','customers','user_roles','locations']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        //$users->account_id = $request->input('account_id');
        if ($request->input('authentication') == 1) {
            $users->authentication = true;
            $users->authentication_status = 'N';
        }else{
            $users->authentication = 'false';
        }
        $users->user_role = $request->input('user_role');
        $users->first_name = $request->input('first_name');
        $users->last_name = $request->input('last_name');
        $users->location_id = json_encode($request->input('location_id'));
        $users->email = $request->input('email');
        if($request->password != ""){
            $users->password = bcrypt($request->input('password'));
        }
        $users->save();
        return redirect('/users')->with('success',"Update User successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $users = User::find($_POST['id']);
        $users->delete();
       // return redirect('/users')->with('danger',"Users Deleted Successfully");
    }
}
