<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{


    public function index(){

        $schedule1=Schedule::where('doc_id',Auth::user()->id)->where('day',1)->first();
        $schedule2=Schedule::where('doc_id',Auth::user()->id)->where('day',2)->first();
        $schedule3=Schedule::where('doc_id',Auth::user()->id)->where('day',3)->first();
        $schedule4=Schedule::where('doc_id',Auth::user()->id)->where('day',4)->first();
        $schedule5=Schedule::where('doc_id',Auth::user()->id)->where('day',5)->first();
        $schedule6=Schedule::where('doc_id',Auth::user()->id)->where('day',6)->first();
        $schedule7=Schedule::where('doc_id',Auth::user()->id)->where('day',7)->first();
        return view('doctor.schedule.index',compact(['schedule1','schedule2','schedule3','schedule4','schedule5','schedule6','schedule7']));
    }

    public function add(Request $request){

        try {
            Schedule::create([
                'doc_id' => Auth::user()->id,
                'day' => $request->day,
                'capacity' => $request->capacity,
                'status' => 1,
                'time' => $request->times . '-' . $request->timee,
            ]);
            return redirect()->route('doctor.schedule')->with(['message' => 'the time added successfully', 'color' => 'green']);
        }catch (\Exception $e){
            return redirect()->route('doctor.schedule')->with(['message' => 'the time not added please try again', 'color' => 'red']);

        }
    }

    public function edit(Request $request){
        try {
            $schedule = Schedule::find($request->id);
            $schedule->update([
                'capacity' => $request->capacity,
                'time' => $request->times . '-' . $request->timee,
            ]);
            return redirect()->route('doctor.schedule')->with(['message' => 'the time updated successfully', 'color' => 'green']);
        }catch (\Exception $e){
            return redirect()->route('doctor.schedule')->with(['message' => 'the time not updated please try again', 'color' => 'red']);

        }
    }

    public function status($id){
        try {
            $schedule = Schedule::find($id);
            if ($schedule->status == 0) {
                $schedule->status = 1;
                $message = 'the day activated successfully';
            } else {
                $schedule->status = 0;
                $message = 'the day deactivated successfully';
            }
            $schedule->save();
            return redirect()->route('doctor.schedule')->with(['message' => $message, 'color' => 'green']);
        }catch (\Exception $e){
            return redirect()->route('doctor.schedule')->with(['message' => 'the day not changed please try again', 'color' => 'red']);

        }
    }
}
