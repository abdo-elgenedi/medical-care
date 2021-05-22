<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index(){

         $patients=User::with(['location','appointments'=>function($q){
            $q->orderBy('date','DESC');
        }])->get();
        return view('admin.patient.index',compact(['patients']));
    }


    public function status(Request $request){

        $user=User::find($request->id);
        if (!$user){
            return response()->json([
                'status'=>false,
                'message'=>'the patient not founded',
                'color'=>'red',
            ]);
        }
        if ($user->status==0){
            $user->status=1;
            $message='the patient activated successfully';
            $value=true;
        }else{
            $user->status=0;
            $message='the patient blocked successfully';
            $value=false;
        }
        $user->save();
        return response()->json([
            'status'=>true,
            'message'=>$message,
            'color'=>'green',
            'value'=>$value,
            'id'=>$user->id
        ]);
    }
}
