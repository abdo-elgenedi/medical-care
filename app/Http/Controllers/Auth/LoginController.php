<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        if (Auth::guard('web')->attempt(['email'=>request()->email,'password'=>request()->password])){
            if (Auth::guard('web')->user()->status==0){
                Auth::guard('web')->logout();
                return redirect()->back()->with('message','You are blocked from using our services');
            }
            return redirect()->intended('/patient');
        }else{
            return redirect()->back()->with('message','email or password is incorrect');
        }
    }
}
