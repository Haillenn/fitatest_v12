<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//route register
Route::get('/register',[AuthController::class, 'loadRegister']);
Route::post('/register',[AuthController::class, 'userRegister'])->name('userRegister');

//route landing page
Route::get('/homeDashboard', function(){
    return redirect('/');
});

//route homeDashboard
Route::get('/',[AuthController::class, 'loadHomeDashboard']);

//route login
Route::get('/login',[AuthController::class, 'loadLogin']);
Route::post('/login',[AuthController::class, 'userLogin'])->name('userLogin');

//route logout
Route::get('/logout',[AuthController::class, 'logout']);

//route forget password
Route::get('/forget-password',[AuthController::class, 'forgetPasswordLoad']);
Route::post('/forget-password',[AuthController::class, 'forgetPassword'])->name('forgetPassword');

//route reset password
Route::get('/reset-password',[AuthController::class, 'resetPasswordLoad']);
Route::post('/reset-password',[AuthController::class, 'resetPassword'])->name('resetPassword');
