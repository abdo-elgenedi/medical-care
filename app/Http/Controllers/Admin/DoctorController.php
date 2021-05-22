<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{


    public function index(){

        $doctors=Doctor::with(['appointments'=>function($q){$q->where('status',1);},'speciality'])->get();
        return view('admin.doctor.index',compact(['doctors']));
    }

    public function status(Request $request){

        $doctor=Doctor::find($request->id);
        if (!$doctor){
            return response()->json([
                'status'=>false,
                'message'=>'the doctor not founded',
                'color'=>'red',
            ]);
        }
        if ($doctor->status==0){
            $doctor->status=1;
            $message='the doctor activated successfully';
            $value=true;
        }else{
            $doctor->status=0;
            $message='the doctor blocked successfully';
            $value=false;
        }
        $doctor->save();
        return response()->json([
            'status'=>true,
            'message'=>$message,
            'color'=>'green',
            'value'=>$value,
            'id'=>$doctor->id
        ]);
    }
}
