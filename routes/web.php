<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('register','registerform')->name('registerform');
    Route::post('register','register')->name('register');

    Route::get('login','loginform')->name('loginform');
    Route::post('login','login')->name('login');

    Route::post('logout','logout')->name('logout');
    

});