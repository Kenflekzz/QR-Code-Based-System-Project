<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::post('/insert-data',[RegisterController::class,'register']);
Route::get('/User-Form',function(){return view('forms.UserForm');});
Route::get('/login',[LoginController::class,'showLoginForm'])->name('forms.UserLogIn');
Route::post('/login',[LoginController::class,'login']);
