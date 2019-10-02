<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use DB;
use App\Module_permission;
use User;

class user_permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        // if(Auth::User()->user_role==4){
        //     return redirect('/report/add');
        // }
        // if (Auth::User()->user_role == 3) {
        //     return redirect('/reports');
        // } 


        
        // $UserPermissions = Module_permission::getPermissions(Auth::User()->user_role);
        // //dd($UserPermissions);
        // $UserPer = [];
        // foreach ($UserPermissions as $key => $value) {
        //     $UserPer[] = $value->module_slug;
        // }

        // if(!in_array($request->segment(1), $UserPer) && !empty($request->segment(1))){
        //         return redirect('/');
        // }
         return $next($request);
    }


}
