<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
use Auth;
use App\User;
use Carbon\Carbon;

class LoginController extends Controller
{

    //use ThrottlesLogins;

    public function __construct()
    {

        //$this->middleware('guest')->except('logout');
        
    }

    // public function login(Request $request){
    //     //dd($request->has('remember'));
    //     $credentials = ['email' => $request->email, 'password' => $request->password];
    //     if(Auth::attempt($credentials))
    //         return redirect('/');

    //         //$throttles = $this->isUsingThrottlesLoginsTrait();
    //     //$throttles = $this->isUsingThrottlesLoginsTrait();
    //     //dd(Auth::guard('location')->attempt($credentials, $request->has('remember')));
    //     if(Auth::guard('location')->attempt($credentials, true)){
    //         //$request->session->put('location', $request->email);
    //         $credentials = ['email' => 'location@gmail.com', 'password' => 'tire'];
    //         if(Auth::attempt($credentials))
    //             return redirect('/');
    //     }
    //         //dd(Auth::guard('location'));
    //         //return $this->handleUserWasAuthenticated($request, $throttles);
    //         //return redirect('/');
    //     //dd(Auth::guard('location'));
    //     //Auth::guard('location')->attempt($credentials);
    //     //return redirect('/');
    // }
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function authenticated(Request $request, $user) {
        if ($user->user_role == 1) {
            return redirect('/');
        } else if ($user->user_role == 2 || $user->user_role == 3) {
            return redirect('/reports');
        } elseif ($user->user_role == 4) {
            return redirect('/report/add');
        }
    }
	
	public function authentication(){
		return view('auth/authentication');
	}
	
	public function authentication_check(Request $request){
		$user = Auth::User();
		$current_time 	= Carbon::now();
		$current_time 	= Carbon::parse($current_time);
		$auth_time 		= Carbon::parse($user->authentication_time);
		$totalDuration 	= $auth_time->diffInSeconds($current_time);
		if($user->authentication_code==$request->code){
			if($totalDuration<=300){
				$user = User::find(Auth::User()->id);
				$user->authentication_status = 'Y';
				$user->save();
	
				if ($user->user_role == 1) {
					return redirect('/');
				} else if ($user->user_role == 2 || $user->user_role == 3) {
					return redirect('/reports');
				} elseif ($user->user_role == 4) {
					return redirect('/report/add');
				}
			}else{
				return \Redirect::back()->withErrors(['Your code is expire now. Please login again.']);
			}
			
		}else{
			return \Redirect::back()->withErrors(['Your code is not match with our database.']);
		}
	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
}
