<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class Attendees extends Model
{
    protected $fillable = ['name', 'address', 'email', 'password'];
}

