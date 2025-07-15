<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index() {
        $products = Product::get();
        return view('home',compact('products'));
    }
    public function add_to_cart() {
        $product_id = request()->product_id;
        $product = Product::findOrFail($product_id);
        try {
            $cart = Cart::where(['product_id'=> $product_id, 'status' => 'Pending'])->first();
            if($cart) {
                $cart->quantity = request()->quantity + $cart->quantity;
                $cart->save();
            }
            else {
                $cart = new Cart;
                $cart->user_id = auth()->user()->id;
                $cart->product_id = $product_id;
                $cart->quantity = request()->quantity;
                $cart->save();
            }

            $validator['success'] = 'Added to cart';
            return back()->withErrors($validator);
        } catch (\Exception $e) {
            DB::rollBack();
            $validator['error'] = $e->getMessage();
            return back()->withErrors($validator);
        }
    }
    public function remove_from_cart($cart_id) {
        try {
            $cart = Cart::findOrFail($cart_id);
            $cart->delete();

            $validator['success'] = 'Removed From cart';
            return back()->withErrors($validator);
        } catch (\Exception $e) {
            DB::rollBack();
            $validator['error'] = $e->getMessage();
            return back()->withErrors($validator);
        }
    }
}
