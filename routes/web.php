<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
Route::resource('categories', CategoryController::class);
