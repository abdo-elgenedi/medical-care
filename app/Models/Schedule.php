<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $table='schedules';
    protected $fillable=['doc_id','day','time','capacity','status'];

    public $timestamps=false;
}
