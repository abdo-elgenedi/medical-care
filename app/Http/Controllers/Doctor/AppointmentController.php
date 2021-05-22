<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{


    public function index(){

        return view('doctor.appointment.index');
    }

    public function changeStatus($id){

        $app=Appointment::find($id);
        if (!$app){
            return redirect()->back()->with(['message'=>'the appointment not founded','color'=>'red']);
        }
        if ($app->status==0){$app->status=1;$message='the appointments accepted successfully';}
        elseif ($app->status==1){$app->status=0;$message='the appointments cancelled successfully';}
        try{
            $app->save();
            return redirect()->back()->with(['message'=>$message,'color'=>'green']);
        }catch(\Exception $e){
            return redirect()->back()->with(['message'=>'the status not changed please try again','color'=>'red']);
        }
    }
}
