<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order) {
        $order_details = OrderDetail::with('product', 'order')->where('order_id', $order->id)->get();
        return view('admin.orders.show', compact('order', 'order_details'));
    }

    public function deliver(Order $order)
    {
        $order->status = 'in delivery';
        $order_details = OrderDetail::with('product', 'order')->where('order_id', $order->id)->get();

        foreach($order_details as $detail) {
            $product = Product::find($detail->product_id);
            $product->instock -= $detail->quantity;
            $product->save();
        }

        $order->save();
        return back()->with('message', 'Order is in delivery!')->with('class', 'success');
    }

    public function complete(Order $order)
    {
        $order->status = 'completed';
        $order->save();
        return back()->with('message', 'Order is complete!')->with('class', 'success');
    }

    public function destroy(Order $order)
    {

        $order->orderDetails()->delete();
        $order->delete();
        return back()->with('message', 'Order Successfully Deleted!')
            ->with('class', 'success');
    }
}
