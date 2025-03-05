<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;

Route::get('/', [IndexController::class,'index'])->name('home');

//prefix auth

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/registr',[AuthController::class,'registr'])->name('registr');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/show/login',[AuthController::class,'loginShow'])->name('loginShow');
Route::get('/show/registr',[AuthController::class,'registrShow'])->name('registrShow');

Route::middleware("auth")->group(function(){
    Route::get('/test',function(){
        echo '<pre>'.htmlentities(print_r('its work:)', true)).'</pre>';exit();
    });
});

// Route::middleware("quest")->group(function(){

// });
//prefix category

//prefix cart

//prefix orders