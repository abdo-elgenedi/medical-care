<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class SearchController extends Controller
{


    public function search(Request $request){

        $doctors=Doctor::where('city',$request->city)->where('status',1)->with('speciality')->with('location')->with('reviews')->get();
        return view('website.search',compact('doctors'));
    }

    public function getDoctorProfile($id){

        $doctor=Doctor::with('speciality')->with('location')->with(['reviews'=>function($q){$q->with('patient');}])->with('schedule')->find($id);
        return view('website.doctorprofile',compact('doctor'));
    }


    public function getPatientProfile($id){

        $patient=User::with('location')->find($id);
        return view('website.patientprofile',compact('patient'));
    }
}
