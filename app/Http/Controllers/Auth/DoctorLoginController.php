<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class DoctorLoginController extends Controller
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
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DOCTOR;

    public function getLogin(){

        return view('doctor.login');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function logout(){

        if (Auth::guard('doctor')){
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route('doctor.login');
        }
    }
    public function login(){
        if (Auth::guard('doctor')->attempt(['email'=>request()->email,'password'=>request()->password])){
            if (Auth::guard('doctor')->user()->status==0){
                Auth::guard('doctor')->logout();
                return redirect()->back()->with('message','You are blocked from using our services');
            }
            return redirect()->intended('/doctor');
        }else{
            return redirect()->back()->with('message','email or password is incorrect');
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
