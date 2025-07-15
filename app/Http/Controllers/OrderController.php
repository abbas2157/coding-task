<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Cart, Order};
use Illuminate\Support\Facades\{Auth, DB};


class OrderController extends Controller
{
    public function checkout() {
        $carts = Cart::where(['user_id' => auth()->user()->id, 'status' => 'Pending'])->with('product')->get();
        return view('checkout.index',compact('carts'));
    }
    public function checkout_perform() {
        $carts = Cart::where(['user_id' => auth()->user()->id, 'status' => 'Pending'])->get();

        if(is_null($carts)) {
            $validator['error'] = 'Cart is empty';
            return back()->withErrors($validator);
        }
        try {
            DB::beginTransaction();
            
            $order = new Order;
            $order->user_id = auth()->user()->id;
            $order->save();

            foreach($carts as $item) {
                $item->order_id = $order->id;
                $item->status = 'Purchased';
                $item->save();
            }

            DB::commit();

            $validator['success'] = 'Order created successfully!';
            return redirect('/')->withErrors($validator);
        } catch (\Exception $e) {
            DB::rollBack();
            $validator['error'] = $e->getMessage();
            return back()->withErrors($validator);
        }


        return view('checkout.index',compact('carts'));
    }
}
