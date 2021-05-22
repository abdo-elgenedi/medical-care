<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    public function index(){

        $reviews=Review::with(['patient','doctor'])->get();
        return view('admin.review.index',compact(['reviews']));
    }

    public function delete(Request $request){

        $review=Review::find($request->id);
        if(!$review){
         return redirect()->back()->with(['message'=>'we couldn\'t find this review','color'=>'red']);
        }
        try{
            $review->delete();
            return redirect()->back()->with(['message'=>'this review deleted successfully','color'=>'green']);
        }catch (\Exception $e){
            return redirect()->back()->with(['message'=>'the review not deleted please try again','color'=>'red']);
        }
    }
}
