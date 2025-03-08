<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoodsController;


Route::get('/', [IndexController::class,'index'])->name('home');

//prefix auth

Route::post('/login',[AuthController::class,'login'])->name('login_process');
Route::post('/registr',[AuthController::class,'registr'])->name('registr_process');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/show/login',[AuthController::class,'loginShow'])->name('login');
Route::get('/show/registr',[AuthController::class,'registrShow'])->name('registr');

Route::middleware("auth")->group(function(){
    Route::get('/test',function(){
        echo '<pre>'.htmlentities(print_r('its work:)', true)).'</pre>';exit();
    });
});

Route::get('/category/get',[CategoryController::class,'get'])->name('category');

Route::get('/goods/create/show',[GoodsController::class,'goodsCreateShow'])->name('goodsCreateShow');
Route::post('/goods/create',[GoodsController::class,'goodsCreate'])->name('goodsCreate');

Route::get('/goods/edit/show',[GoodsController::class,'goodsEditShow'])->name('goodsEditShow');
Route::post('/goods/edit',[GoodsController::class,'goodsEdit'])->name('goodsEdit');




