<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user-register',[AuthController::class,'userRegister']);
Route::get('/user-login',[AuthController::class,'userLogin']);
Route::post('user/store',[AuthController::class,'userStore']);
Route::get('otp-form',[AuthController::class,'otpForm'])->name('otp.form');
Route::post('otp-verification',[AuthController::class, 'otpVerification']);
Route::get('/forget-password',[AuthController::class,'forgetPassword']);

//
Route::get('/pay',[PaymentController::class,'pay']);
//for strip payment integration...
Route::get('/stripe-checkout',[StripeController::class,'stripCheckout']);
Route::get('/stripe/checkout-session',[StripeController::class,'session']);
Route::get('/stripe/checkout-cancel',[StripeController::class,'cancel']);
Route::get('/stripe/checkout-success',[StripeController::class,'success']);