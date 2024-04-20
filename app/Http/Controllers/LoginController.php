<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    public function login (Request $request){
        $credentials = $request->only("email","password");
        if(Auth::attempt($credentials)){
            return "Authentication Successful";
        }else{
            return "Username or Password is incorrect";
        }
    }
    public function showLoginForm(){
        return view('forms.UserLogIn');
    }
}