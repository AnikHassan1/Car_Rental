<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Middleware\userAuthentification;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cars',CarController::class);
Route::resource('rental',RentalController::class);
Route::post('/signup',[CustomerController::class,'signUp']);

Route::post('/login-page',[CustomerController::class,'login'])->name("login");
Route::get('/log-out',[CustomerController::class,'logout']);
Route::get('/profile/{id}',[CustomerController::class,'profileGet']);
Route::post('/createProfile',[CustomerController::class,'createProfile'])->middleware(userAuthentification::class);