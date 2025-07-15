<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Api\BaseController as BaseController;

class ApiController extends BaseController
{
    public function products() {
        $products = Product::get();
        return $this->sendResponse($products, 'Here is the list of products.', 200);
    }
}
