<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Queue\Failed\PrunableFailedJobProvider;

class WelcomeController extends Controller
{
    Public function welcome(){
    return view('welcome');
    }
}
