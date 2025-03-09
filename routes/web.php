<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;



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

Route::prefix('/goods')->group(function(){
    Route::get('/create/show',[GoodsController::class,'goodsCreateShow'])->name('goodsCreateShow');
    Route::post('/create',[GoodsController::class,'goodsCreate'])->name('goodsCreate');
    Route::get('/edit/show',[GoodsController::class,'goodsEditShow'])->name('goodsEditShow');
    Route::post('/edit',[GoodsController::class,'goodsEdit'])->name('goodsEdit');
});

Route::prefix('/cart')->group(function(){
    Route::get('/get/show',[CartController::class,'cartGetShow'])->name('cartGetShow');
    Route::post('/add',[CartController::class,'addToCart'])->name('cartAdd');
    Route::post('/edit',[CartController::class,'cartEdit'])->name('cartEdit');
});

Route::prefix('/order')->group(function(){
    Route::post('/complete-by-id',[OrdersController::class,'completeById'])->name('orderCompleteById');
    Route::get('/get',[OrdersController::class,'orderGetShow'])->name('orderGetShow');
    Route::post('/edit',[OrdersController::class,'orderItemEdit'])->name('orderItemEdit');
    Route::post('/delete',[OrdersController::class,'orderItemDelete'])->name('orderItemDelete');
});




