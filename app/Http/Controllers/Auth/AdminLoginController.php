<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{


    public function getLogin(){

        return view('admin.login');
    }

    public function login(Request $request){

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->intended('/admin/dashboard');
        }else{
            return redirect()->back()->with(['message'=>'user name or password is incorrect']);
        }
    }

    public function logout(){

        if (Auth::guard('admin')){
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route('admin.login');
        }

    }
}
