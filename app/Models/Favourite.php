<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table='favourites';

    protected $fillable=['p_id','d_id'];

    public $timestamps=false;

    public function doctor(){

        return $this->belongsTo(Doctor::class,'d_id');
    }

    public function patient(){

        return $this->belongsTo(User::class,'p_id');
    }
}
