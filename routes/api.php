<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Get products
Route::get('products', [App\Http\Controllers\Api\ApiController::class, 'products']);

Route::group(['prefix' => 'account'], function(){
    Route::post('login', [App\Http\Controllers\Api\AccountController::class, 'login']);
});