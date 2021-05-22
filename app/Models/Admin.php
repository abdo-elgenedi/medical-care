<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    protected $table='admins';
    protected $fillable=['name','username','password','email','mobile','image','status','super_admin','created_at','updated_at'];


}
