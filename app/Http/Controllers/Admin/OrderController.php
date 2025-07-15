<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::with('user', 'items')->get();
        return view('admin.orders.index',compact('orders'));
    }
    public function change_status($order) {
        try {

            $order = Order::findOrFail($order);
            $order->status = request()->status;
            $order->save();

            $validator['success'] = 'Order Status Changes';
            return back()->withErrors($validator);
        } catch (\Exception $e) {
            $validator['error'] = $e->getMessage();
            return back()->withErrors($validator);
        }
    }
}
