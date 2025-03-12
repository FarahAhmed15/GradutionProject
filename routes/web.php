<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ServiceProviderAuthController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("dashboard",function(){
    return view("dashboard");
})->name("dashboard");
Route::controller(UserAuthController::class)->group(function(){
    Route::get('user/register','registerform')->name('user.registerform');
    Route::post('user/register','register')->name('user.register');

    Route::get('user/login','loginform')->name('user.loginform');
    Route::post('user/login','login')->name('user.login');

    Route::post('user/logout','logout')->name('user.logout');

    Route::middleware(['auth.user'])->group(function () {
    Route::get('user/dashboard', function () {
        return view('user');
    })->name('user.dashboard');
    });

});
Route::controller(ServiceProviderAuthController::class)->group(function(){
    Route::get('provider/register','registerform')->name('provider.registerform');
    Route::post('provider/register','register')->name('provider.register');

    Route::get('provider/login','loginform')->name('provider.loginform');
    Route::post('provider/login','login')->name('provider.login');

    Route::post('provider/logout','logout')->name('provider.logout');

    Route::middleware(['auth.provider'])->group(function () {
    Route::get('provider/dashboard', function () {
        return view('provider');
    })->name('provider.dashboard');
    });

});
Route::controller(AdminAuthController::class)->group(function(){
    Route::get('admin/register','registerform')->name('admin.registerform');
    Route::post('admin/register','register')->name('admin.register');

    Route::get('admin/login','loginform')->name('admin.loginform');
    Route::post('admin/login','login')->name('admin.login');

    Route::post('admin/logout','logout')->name('admin.logout');

    Route::middleware(['auth.admin'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin');
    })->name('admin.dashboard');
    });
});
// Route::resource('categories', CategoryController::class);
