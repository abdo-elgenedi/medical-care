<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Appointment;
use App\Models\Review;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{


    public function index(){

          $pastAppointments=Appointment::where('p_id',Auth::user()->id)->with(['doctor'=>function($q){$q->with(['speciality','schedule']);}])->whereDate('date','<',Carbon::today())->get();
          $upcomingAppointments=Appointment::where('p_id',Auth::user()->id)->with(['doctor'=>function($q){$q->with(['speciality','schedule']);}])->whereDate('date','>=',Carbon::today())->get();
            foreach($upcomingAppointments as $appointment)
        foreach ($appointment->doctor->schedule as $item){
            if ($item->day==1){$item->day='Saturday';}
            if ($item->day==2){$item->day='Sunday';}
            if ($item->day==3){$item->day='Monday';}
            if ($item->day==4){$item->day='Tuesday';}
            if ($item->day==5){$item->day='Wednesday';}
            if ($item->day==6){$item->day='Thursday';}
            if ($item->day==7){$item->day='Friday';}
        }
        return view('patient.index',compact(['pastAppointments','upcomingAppointments']));
    }


    public function getProfile(){

        return view('patient.profile');
    }

    public function updateProfile(PatientRequest $request){

        $user=User::find(Auth::user()->id);
        $oldImage=$user->image;
        if (isset($request->image)){
            $imageName=$user->name.time().$request->image->hashName();
        }else{
            $imageName=$user->image;
        }
        try {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'dob' => $request->dob,
                'blood' => $request->blood,
                'gender' => $request->gender,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'image' => $imageName,
            ]);

            if (isset($request->image)) {

                $request->image->move(base_path() . '/public/images/patients/', $imageName);
                try {
                    if ($oldImage!='patient.jpg')
                    unlink(base_path() . '/public/images/patients/' . $oldImage);
                } catch (\Exception $e) {
                }
            }
            return redirect()->route('patient.dashboard')->with(['message'=>'Your profile updated successfully','color'=>'green']);
        }catch(\Exception $e){
            return redirect()->back()->with(['message'=>'something went wrong please try again','color'=>'red']);
        }
    }

    public function getChangePassword(){

        return view('patient.changepassword');
    }

    public function updatePassword(Request $request){

        $validate=Validator::make($request->only(['password','password_confirmation']),
            ['password'=>['required', 'string', 'min:8', 'confirmed']],
            ['confirmed'=>'the password doesn\'t matched' , 'password.min'=>'the :attribute must be at least 8 chars',]);
        if ($validate->fails()){
            return redirect()->back()->withErrors($validate->errors());
        }
        $user=User::find(Auth::user()->id);
        if (!Auth::guard('web')->validate(['email'=>$user->email,'password'=>$request->oldpassword])){
            return redirect()->back()->with(['message'=>'your password is incorrect please enter the correct password','color'=>'red']);
        }
        try {
            $user->update([
               'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('patient.dashboard')->with(['message'=>'Your password updated successfully','color'=>'green']);
        }catch(\Exception $e){
            return redirect()->back()->with(['message'=>'something went wrong please try again','color'=>'red']);
        }
    }
}
