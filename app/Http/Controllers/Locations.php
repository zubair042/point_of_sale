<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Location;
use App\User;
use App\Account;
use Auth;
use DB;

class Locations extends Controller
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
            $location_detail = DB::table('locations')
                                //->join('accounts',"locations.account_id","=","accounts.id")
                                ->where('locations.account_id',$account_id)
                                ->select('locations.*')
                                ->get();

            foreach($location_detail as $key=>$val):
                $location_detail[$key]->users = DB::table("users")->where("location_id", "like", "%".$val->id."%")->get();
            endforeach;
        }
        else{
            $location_detail = DB::table('locations')
                                //->join('accounts','locations.account_id','=','accounts.id')
                                ->select('locations.*')
                                ->get();  
                                
            foreach($location_detail as $key=>$val):
                $location_detail[$key]->users = DB::table("users")->where("location_id", "like", "%".$val->id."%")->get();
            endforeach;
        }
        return view('location/index')->with('location_detail',$location_detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->user_role !=1) {
            $customers = DB::table('accounts')
                            ->where('id',Auth::user()->account_id)
                            ->get();
        }else{
            $customers = Account::all();  
        }
        return view('location/add_location',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location;
        //$dd($location);
        //$account->item_name = json_encode($request->input('item_name'));
        $location->item_name = implode(",", $request->input('item_name'));
        $location->quantity = json_encode($request->input('quantity'));
        $location->foot = json_encode($request->input('foot'));
        $location->price = json_encode($request->input('price'));
        $total_price = array_sum($request->input('price'));

        $location->created_by = Auth::user()->id;
        $location->save();

        return redirect('/location')->with('success',"Location added successfully");
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
        if (Auth::user()->user_role !=1) {
            $customers = DB::table('accounts')
                            ->where('id',Auth::user()->account_id)
                            ->get();
        }else{
            $customers = Account::all();
        }
        $location = Location::find($id);
        return view('location/edit_location',compact(['location','customers']));
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
        $location = Location::find($id);
        $location->created_by       = Auth::user()->id;
        $location->account_id       = $request->input('account_id');
        $location->location_name    = $request->input('location_name');
        $location->user_name        = $request->input('username');
        $location->email            = $request->input('email');
        $location->password         = bcrypt($request->input('password'));
        $location->address          = $request->input('address');
        $location->city             = $request->input('city');
        $location->state            = $request->input('state');
        $location->zip              = $request->input('zip');
        $location->save();

        $user = User::find($location->user_id);
        $user->account_id   = $request->input('account_id');
        $user->email        = $request->input('email');
        $user->first_name   = $request->input('username');
        $user->last_name    = '';
        $user->password     = bcrypt($request->input('password'));
        $user->created_by   = Auth::user()->id;
        $user->save();

        return redirect('/location')->with('success',"Location updated successfully");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {   //print_r($_POST);exit;
        $location   = Location::find($_POST['id']);
        $location->delete();
        $user = User::find($_POST['user_id']);
        $user->delete();
    }
    public function getLocationById(){
        $location_user = DB::table('locations')
                            ->where('user_id', Auth::user()->id)
                            ->get();
        //                     ->where('users.id', $_POST['id'])
        //                     ->whereIn('locations.id',$location_id)
        //                     ->select('locations.*')
        //                     ->get();
        return $location_user;

    }
    public function getUserById(){
        $users  = DB::table('users')
                    ->join('accounts','users.account_id','=','accounts.id')
                    ->where('users.user_role', 3)
                    ->where('accounts.id', $_POST['id'])
                    ->select('users.*')
                    ->get();
        return $users;
    }
}
