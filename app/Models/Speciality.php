<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table='specialties';
    protected $fillable=['name','image'];

    public $timestamps=false;

    public function doctors(){

        return $this->hasMany(Doctor::class,'speciality_id');
    }
}
