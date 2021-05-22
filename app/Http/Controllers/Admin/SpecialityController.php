<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{


    public function index(){
        $specs=Speciality::get();
        return view('admin.speciality.index',compact(['specs']));
    }

    public function create(Request $request){

        if (isset($request->image)){
            $imageName=$request->image->hashName();
        }else{$imageName=null;}
        try {
            Speciality::create([
                'name' => $request->name,
                'image' => $imageName,
            ]);

            if (isset($request->image)){
                $request->image->move(base_path().'/public/images/specialities/',$imageName);
            }
            return redirect()->route('admin.speciality')->with(['message'=>'the speciality added successfully','color'=>'green']);
        }catch (\Exception $e){
            return redirect()->route('admin.speciality')->with(['message'=>'the speciality not added please try again','color'=>'red']);
        }
    }

    public function update(Request $request){
        $spec=Speciality::find($request->id);
        if(!$spec){
            return redirect()->route('admin.speciality')->with(['message'=>'the speciality not founded','color'=>'red']);
        }
        if (isset($request->image)){
            $imageName=$request->image->hashName();
            $oldImage=$spec->image;
        }else{$imageName=$spec->image;}
        try {
            $spec->update([
                'name' => $request->name,
                'image' => $imageName,
            ]);

            if (isset($request->image)){
                $request->image->move(base_path().'/public/images/specialities',$imageName);
                try{
                    unlink(base_path().'/public/images/specialities/'.$oldImage);
                }catch (\Exception $e){}
            }
            return redirect()->route('admin.speciality')->with(['message'=>'the speciality updated successfully','color'=>'green']);
        }catch (\Exception $e){
            return redirect()->route('admin.speciality')->with(['message'=>'the speciality not updated please try again','color'=>'red']);
        }
    }

    public function delete(Request $request){
        $spec=Speciality::find($request->id);
        if(!$spec){
            return redirect()->route('admin.speciality')->with(['message'=>'the speciality not founded','color'=>'red']);
        }
        try {
            try {
                unlink(base_path() . '/public/images/specialities/' . $spec->image);
            } catch (\Exception $e) {
            }
            $spec->delete();
            return redirect()->route('admin.speciality')->with(['message'=>'the speciality deleted successfully','color'=>'green']);
        }catch (\Exception $e){
            return redirect()->route('admin.speciality')->with(['message'=>'the speciality not deleted please try again','color'=>'red']);

        }

    }
}
