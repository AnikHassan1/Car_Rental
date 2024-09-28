<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Middleware\userAuthentification;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



// Route::get('/', function () {
//     return view('pages.frontend.main');
// });
Route::get('/admin-page', function () {
    return view('pages.dashboard.dashboard-pages');
});

// pages Route
Route::get('/',[PageController::class,'home']);
Route::get('/signup-page',[PageController::class,'register']);
Route::get('/login-page',[PageController::class,'login']);
Route::get('/forget-page',[PageController::class,'forget']);
Route::get('/dashboard',[PageController::class,'dashboard']);
Route::get('/car',[PageController::class,'car']);
Route::get('/contact',[PageController::class,'contact']);
Route::get('/about',[PageController::class,'about']);
Route::get('/rantals',[PageController::class,'rantals']);
// Resource Route
Route::resource('cars',CarController::class);

Route::resource('rental',RentalController::class);
// customerPages Get Route
Route::get('/log-out',[CustomerController::class,'logout']);
Route::get('/profile/{id}',[CustomerController::class,'profileGet']);
// Customer Pages Post Route
Route::post('/signup',[CustomerController::class,'signUp']);
Route::post('/login',[CustomerController::class,'login']);
Route::post('/passwordForget',[CustomerController::class,'forget'])->middleware(userAuthentification::class);
Route::post('/createProfile',[CustomerController::class,'createProfile'])->middleware(userAuthentification::class);