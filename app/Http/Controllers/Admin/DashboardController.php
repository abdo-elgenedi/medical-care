<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function index(){

         $doctors=Doctor::inRandomOrder()->limit(5)->with(['location','reviews','speciality','appointments'=>function($q){$q->where('status',1);}])->get();
         $patients=User::inRandomOrder()->limit(5)->with(['location','appointments'])->get();
        $sampleAppointments=Appointment::inRandomOrder()->limit(5)->with(['doctor'=>function($q){$q->with('speciality');},'patient'])->get();
        $appointments=Appointment::where('status',1)->with('doctor')->get();
         $revenue=0;
        foreach ($appointments as $appointment) {
            $revenue+=$appointment->doctor->price;
         }

        return view('admin.index',compact(['doctors','patients','appointments','revenue','sampleAppointments']));
    }

    public function getProfile(){

        return view('admin.profile');
    }

    public function updateProfile(AdminRequest $request){

        $admin=Admin::find(Auth::user()->id);
        $oldImage=$admin->image;
        if (isset($request->image)){
            $imageName=$admin->name.time().$request->image->hashName();
        }else{
            $imageName=$admin->image;
        }

        try {
            $admin->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'image' => $imageName,
            ]);
            if (isset($request->image)){
                $request->image->move(base_path().'/public/images/admins',$imageName);
                try{
                    unlink(base_path().'/public/images/admins/'.$oldImage);
                }catch (\Exception $e){}
            }
            return redirect()->back()->with(['message'=>'your profile updated successfully','color'=>'green']);
        }catch (\Exception $e){
            return redirect()->back()->with(['message'=>'your profile not updated please try again','color'=>'red']);
        }
    }

    public function updatePassword(Request $request){
        $validation=Validator::make($request->only('password','password_confirmation'),
            ['password'=>['required','min:8','confirmed']],
            ['required'=>'password filed is required',
                'min'=>'the password must contain at least 8 characters',
                'confirmed'=>'the password doesn\'t matched']);
        if ($validation->fails()){
            session()->flash('passworderror');
            return redirect()->back()->withErrors($validation->errors());
        }
        if (!Auth::guard('admin')->validate(['email'=>Auth::user()->email,'password'=>$request->oldpassword])){
            session()->flash('passworderror');
            return redirect()->back()->with(['password'=>true,'message'=>'your password is incorrect please try again','color'=>'red']);
        }

         $admin=Admin::find(Auth::user()->id);
        $admin->update(['password'=>Hash::make($request->password)]);

        return redirect()->back()->with(['message'=>'your password updated successfully','color'=>'green']);
    }
}
