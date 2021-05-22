<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\Appointment;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Review;
use App\Models\Speciality;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Comment\Doc;

class DashboardController extends Controller
{


    public function index(){
         $patients=Appointment::where('d_id',Auth::user()->id)->get()->unique('p_id');
        $upcomingAppointments=Appointment::where('d_id',Auth::user()->id)->with('patient')->whereDate('date','>=',Carbon::today())->get();
        $pastAppointments=Appointment::where('d_id',Auth::user()->id)->with('patient')->whereDate('date','<',Carbon::today())->get();
        $todayAppointments=Appointment::where('d_id',Auth::user()->id)->with('patient')->whereDate('date','=',Carbon::today())->get();

        return view('doctor.dashboard',compact(['patients','upcomingAppointments','pastAppointments','todayAppointments']));
    }

    public function myPatient(){
        $patients=Appointment::where('d_id',Auth::user()->id)->with('patient')->get()->unique('p_id');
        return view('doctor.mypatient.index',compact(['patients']));
    }

    public function review(){

        $reviews=Review::where('d_id',Auth::user()->id)->with('patient')->get();
        $doctor=Doctor::find(Auth::user()->id);
        return view('doctor.review.index',compact(['reviews','doctor']));
    }

    public function getProfile(){
        $cities=City::all();
        $specialities=Speciality::all();
        return view('doctor.profile',compact(['cities','specialities']));
    }

    public function updateProfile(DoctorRequest $request){

        $doctor=Doctor::find(Auth::user()->id);
        $oldImage=$doctor->image;
        if (isset($request->image)){
            $imageName=$doctor->name.time().$request->image->hashName();
        }else{
            $imageName=$doctor->image;
        }
        try {
            $doctor->update([
                'name' => $request->name,
                'username' => $request->username,
                'dob' => $request->dob,
                'blood' => $request->blood,
                'gender' => $request->gender,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'city' => $request->city,
                'specialty_id' => $request->speciality_id,
                'bio' => $request->bio,
                'price' => $request->price,
                'image' => $imageName,
            ]);

            if (isset($request->image)) {

                $request->image->move(base_path() . '/public/images/doctors/', $imageName);
                try {
                    if ($oldImage!='doctor.jpg')
                        unlink(base_path() . '/public/images/doctors/' . $oldImage);
                } catch (\Exception $e) {
                }
            }
            return redirect()->route('doctor.index')->with(['message'=>'Your profile updated successfully','color'=>'green']);
        }catch(\Exception $e){
            return redirect()->back()->with(['message'=>'something went wrong please try again','color'=>'red']);
        }
    }

    public function getChangePassword(){

        return view('doctor.changepassword');
    }

    public function updatePassword(Request $request){

        $validate=Validator::make($request->only(['password','password_confirmation']),
            ['password'=>['required', 'string', 'min:8', 'confirmed']],
            ['confirmed'=>'the password doesn\'t matched' , 'password.min'=>'the :attribute must be at least 8 chars',]);
        if ($validate->fails()){
            return redirect()->back()->withErrors($validate->errors());
        }
        $doctor=Doctor::find(Auth::user()->id);
        if (!Auth::guard('doctor')->validate(['email'=>$doctor->email,'password'=>$request->oldpassword])){
            return redirect()->back()->with(['message'=>'your password is incorrect please enter the correct password','color'=>'red']);
        }
        try {
            $doctor->update([
                'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('doctor.index')->with(['message'=>'Your password updated successfully','color'=>'green']);
        }catch(\Exception $e){
            return redirect()->back()->with(['message'=>'something went wrong please try again','color'=>'red']);
        }
    }
}
