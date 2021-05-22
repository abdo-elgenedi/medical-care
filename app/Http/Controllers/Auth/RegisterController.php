<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:50','unique:patients,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patients,email'],
            'mobile' => ['required', 'string', 'max:20', 'unique:patients,mobile'],
            'city' => ['required','exists:cities,id'],
            'dob' => ['required','date'],
            'blood' => ['required','in:A-,A+,B-,B+,AB-,AB+,O-,O+'],
            'gender' => ['required','in:0,1'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'required'=>'this :attribute is required',
            'string'=>'this :attribute must be string',
            'name.max'=>':attribute must be less than 50 chars',
            'unique'=>'this :attribute belongs to another patient',
            'username.max'=>':attribute must be less than 50 chars',
            'email'=>':attribute must be like example@domain.com',
            'mobile.max'=>':attribute must be less than 20 chars',
            'exists'=>'please select correct :attribute',
            'date'=>'please select correct date',
            'in'=>'please choose from list only',
            'confirmed'=>'the password doesn\'t matched' ,
            'password.min'=>'the :attribute must be at least 8 chars',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'city' => $data['city'],
            'dob' => $data['dob'],
            'blood' => $data['blood'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
