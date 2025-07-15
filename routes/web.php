<?php

use Illuminate\Support\Facades\Route;

//Home Page Routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Login Routes
Route::group(['prefix' => 'login', 'middleware' => ['guest']], function(){
    Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
    Route::post('/', [App\Http\Controllers\AuthController::class, 'perform'])->name('login.perform');
});
Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function(){
    Route::post('cart', [App\Http\Controllers\HomeController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('cart/remove/{cart_id}', [App\Http\Controllers\HomeController::class, 'remove_from_cart'])->name('remove_from_cart');

    Route::group(['prefix' => 'checkout'], function(){
        Route::get('/', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');
        Route::get('perform', [App\Http\Controllers\OrderController::class, 'checkout_perform'])->name('checkout.perform');
    });
});