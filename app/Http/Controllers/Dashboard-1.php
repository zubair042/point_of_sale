<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Role;
use App\Module_permission;


class Dashboard extends Controller
{
	public function __construct(){
        $this->middleware(['auth', 'permission']);
    }

    public function index(){ 
    	// if (Auth::user()->user_role != 1) { //Other than Global Admin
     //        $account_id = Auth::user()->account_id;
     //        $report_detail = DB::table('reports')
     //                    ->join('accounts','reports.account_id','=','accounts.id')
     //                    ->join('users',"reports.signature_by","=","users.id",'left outer')                        
     //                    ->where('reports.account_id',$account_id)
     //                    ->select('reports.*','users.first_name','users.last_name')
     //                    //->orderBy('reports.id','DESC')
     //                    ->get();
     //    }
     //    else{
     //        $report_detail = DB::table('reports')
     //                    ->join('locations','reports.location_id','=','locations.id','left outer')
     //                    ->join('users',"reports.signature_by","=","users.id",'left outer')
     //                    ->select('reports.*','locations.location_name','users.first_name','users.last_name')
     //                    //->orderBy('reports.created_at','desc')
     //                    ->get();
     //    }
        return view('dashboard/index', compact("report_detail"));
    }
    // public function store(Request $request){
    //     $file = $request->file('file');
    //     $destinationPath = 'uploads';
    //     $file->move($destinationPath,$file->getClientOriginalName());
    // }
}
