<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user-register',[AuthController::class,'userRegister']);
Route::get('/user-login',[AuthController::class,'userLogin']);
Route::post('user/store',[AuthController::class,'userStore']);
Route::get('otp-form',[AuthController::class,'otpForm'])->name('otp.form');
Route::get('/forget-password',[AuthController::class,'forgetPassword']);