<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function home(){

        $cities=City::get();
        $specialities=Speciality::get();
        $doctors=Doctor::inRandomOrder()->limit(8)->with(['location','speciality','reviews'])->get();
        return view('website.home',compact(['cities','specialities','doctors']));
    }
}
