<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{


    public function index(){

        $appointments=Appointment::with(['patient','doctor'=>function($q){
            $q->with(['speciality']);
        }])->get();
        return view('admin.appointment.index',compact(['appointments']));
    }

    public function status(Request $request){

        $appointment=Appointment::find($request->id);
        if (!$appointment){
            return response()->json([
               'status'=>false,
               'message'=>'the appointment not founded',
               'color'=>'red',
            ]);
        }
        if ($appointment->status==0){
            $appointment->status=1;
            $message='the appointment activated successfully';
            $value=true;
        }else{
            $appointment->status=0;
            $message='the appointment cancelled successfully';
            $value=false;
        }
        $appointment->save();
        return response()->json([
           'status'=>true,
           'message'=>$message,
           'color'=>'green',
           'value'=>$value,
            'id'=>$appointment->id
        ]);
    }
}
