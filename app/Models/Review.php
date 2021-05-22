<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table='reviews';

    protected $fillable=['p_id','d_id','rate','message','created_at','updated_at'];


    public function patient(){

        return $this->belongsTo(User::class,'p_id');
    }

     public function doctor(){

        return $this->belongsTo(Doctor::class,'d_id');
    }


}
