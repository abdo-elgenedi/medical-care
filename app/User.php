<?php

namespace App;

use App\Models\Appointment;
use App\Models\City;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='patients';
    protected $fillable = [
        'name','username','email','mobile','city','dob','blood','gender','password','status','image','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob'=>'datetime'
    ];

    public function location(){

        return $this->belongsTo(City::class,'city');
    }

    public function appointments(){
        return $this->hasMany(Appointment::class,'p_id');
    }

}
