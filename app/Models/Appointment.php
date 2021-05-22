<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $table='appointments';

    protected $fillable=['p_id','d_id','date','status','updated_at'];

    public $timestamps=false;
    protected $casts = [
        'date'=>'datetime'
    ];

    public function doctor(){

        return $this->belongsTo(Doctor::class,'d_id');
    }

    public function patient(){

        return $this->belongsTo(User::class,'p_id');
    }
}
