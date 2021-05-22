<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{



    public function index(){

        $favourites=Favourite::where('p_id',Auth::user()->id)->with(['doctor'=>function($q){$q->with(['reviews','location','speciality']);}])->get();
        return view('patient.favourite.index',compact(['favourites']));
    }

    public function add($id){

        $favourite=Favourite::where('p_id',Auth::user()->id)->where('d_id',$id)->first();
        if ($favourite){
            $favourite->delete();
        }else{
            Favourite::create([
                'p_id'=>Auth::user()->id,
                'd_id'=>$id,
            ]);
        }
        return redirect()->back();
    }
}
