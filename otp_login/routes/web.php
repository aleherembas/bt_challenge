<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/verifyOTP','VerifyOTPController@showVerifyForm');

Route::post('/verifyOTP','VerifyOTPController@verify');

Route::group(['middleware' => 'TwoFA'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
