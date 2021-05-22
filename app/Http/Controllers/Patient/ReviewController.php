<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{





    public function add(Request $request){
        $review=Review::where('d_id',$request->d_id)->where('p_id',Auth::user()->id)->first();
        if ($review){

            return redirect()->back()->with(['message'=>'You already reviewed this doctor','color'=>'red']);
        }else{
            if (!isset($request->rating)){$request->rating=0;}
            Review::create([
                'p_id'=>Auth::user()->id,
                'd_id'=>$request->d_id,
                'rate'=>$request->rating,
                'message'=>$request->message
            ]);

            return redirect()->back()->with(['message'=>'your review updated successfully','color'=>'green']);
        }
    }

    public function edit(Request $request){

        $review=Review::where('d_id',$request->d_id)->where('p_id',Auth::user()->id)->first();
        if (!$review){

            return redirect()->back()->with(['message'=>'your review not updated please try again','color'=>'red']);
        }else{
            if (!isset($request->rating)){$request->rating=0;}
            $review->update([
                'rate'=>$request->rating,
                'message'=>$request->message
            ]);

            return redirect()->back()->with(['message'=>'your review updated successfully','color'=>'green']);
        }
    }

    public function delete(Request $request){
        $review=Review::where('d_id',$request->d_id)->where('p_id',Auth::user()->id)->first();
        if (!$review){

            return redirect()->back()->with(['message'=>'your review not deleted please try again','color'=>'red']);
        }else{
            $review->delete();

            return redirect()->back()->with(['message'=>'your review deleted successfully','color'=>'green']);
        }
    }
}
