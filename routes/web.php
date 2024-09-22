<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cars',CarController::class);
Route::post('/signup',[CustomerController::class,'signUp']);

Route::post('/login-page',[RentalController::class,'login']);

Route::post('/test',function (){
    return "ok";
});
Route::get('/test2',function (){
    return "ok2";
});
