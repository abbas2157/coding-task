<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Get products
Route::get('products', [App\Http\Controllers\Api\ApiController::class, 'products']);