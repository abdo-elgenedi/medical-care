<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Review;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function index($id){


        $doctor=Doctor::where('status',1)->with('schedule')->with('appointments')->with(['location'])->find($id);
        if (!$doctor){
            return redirect('/')->with(['message'=>'doctor you are looking for not available now','color'=>'red']);
        }
        foreach ($doctor->schedule as $item){
            if ($item->day==1){$item->day='Saturday';}
            if ($item->day==2){$item->day='Sunday';}
            if ($item->day==3){$item->day='Monday';}
            if ($item->day==4){$item->day='Tuesday';}
            if ($item->day==5){$item->day='Wednesday';}
            if ($item->day==6){$item->day='Thursday';}
            if ($item->day==7){$item->day='Friday';}
        }
        $today=Carbon::parse(now());
        $calender[0]['date']=$today;
         $calender[0]['appointments']=Appointment::where('d_id',$id)->whereDate('date',($calender[0]['date']))->get();
        for($i=1;$i<14;$i++){
           $calender[$i]['date']=$calender[$i-1]['date']->copy()->addDay();
            $calender[$i]['appointments']=Appointment::where('d_id',$id)->whereDate('date',($calender[$i]['date']))->get();
        }
         $calender[0]['appointments']->count();
        for($i=0;$i<14;$i++){
            foreach ($doctor->schedule as $schedule) {
                  if ($schedule->day==$calender[$i]['date']->dayName){
                      $calender[$i]['time']=$schedule->time;
                      $calender[$i]['capacity']=$schedule->capacity;
                      $calender[$i]['status']=$schedule->status;
                      break;
                  }else{
                      $calender[$i]['time']=0;
                      $calender[$i]['capacity']=0;
                      $calender[$i]['status']=0;
                  }
            }
            if ($calender[$i]['capacity']<=($calender[$i]['appointments'])->count()||$calender[$i]['status']==0){
                $calender[$i]['availability']=0;
            }else{
                $calender[$i]['availability']=1;
            }

        }

        return view('patient.booking.index',compact(['calender','doctor']));
    }

    public function confirm(Request $request){
        $doctor=Doctor::where('status',1)->find($request->d_id);
            if(!$doctor){
                return redirect('/')->with(['message'=>'doctor you are looking for not available now','color'=>'red']);
            }
        $date=Carbon::parse($request->date);
        $appointments=Appointment::where('d_id',$request->d_id)->whereDate('date',$date)->get();
        $day=$date->dayName;
        if ($day=='Saturday'){$day=1;}elseif($day=='Sunday'){$day=2;}elseif($day=='Monday'){$day=3;}elseif($day=='Tuesday'){$day=4;}
        elseif($day=='Wednesday'){$day=5;}elseif($day=='Thursday'){$day=6;}elseif($day=='Friday'){$day=7;}
        $day=Schedule::where('doc_id',$request->d_id)->where('day',$day)->first();
        if($day->status==0||$day->capacity<=$appointments->count()){
            return redirect()->route('patient.dashboard')->with(['message'=>'Too Late This Appointment Not Still Available ,Sorry!','color'=>'red']);
        }elseif((Appointment::where('d_id',$request->d_id)->where('p_id',Auth::user()->id)->whereDate('date',$date)->count()>0)){
            return redirect()->route('patient.dashboard')->with(['message'=>'You are already booked this appointments ,Sorry!','color'=>'red']);
        }else{
            try{
                Appointment::create([
                    'd_id'=>$request->d_id,
                    'p_id'=>Auth::user()->id,
                    'date'=>$date,
                ]);
                return redirect()->route('patient.dashboard')->with(['message'=>'Your booking done successfully','color'=>'green']);
            }catch (\Exception $e){
                return redirect()->route('patient.dashboard')->with(['message'=>'Error while booking please try again','color'=>'red']);
            }
        }


    }
}
