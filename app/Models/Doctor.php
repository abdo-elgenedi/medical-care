<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use Notifiable;
    protected $table='doctors';
    protected $fillable=['name','username','password','email','mobile','city','status','dob','gender','specialty_id','bio','price','image','created_at','updated_at'];



    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'dob'=>'datetime'
    ];

    public function speciality(){

        return $this->belongsTo(Speciality::class,'specialty_id');
    }

     public function location(){

        return $this->belongsTo(City::class,'city');
    }

     public function reviews(){

        return $this->hasMany(Review::class,'d_id');
    }

    public function schedule(){

        return $this->hasMany(Schedule::class,'doc_id');
    }

    public function appointments(){

        return $this->hasMany(Appointment::class,'d_id');
    }



}
