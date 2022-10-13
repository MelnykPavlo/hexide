<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy("created_at", "DESC")->paginate(10);
        return view("admin.orders.orders", ["orders" => $orders]);
    }

    public function execute($id)
    {
        $order = Order::findOrFail($id);
        if ($order) {
            $order->status = true;
            $order->save();
            return redirect()->route("orders");
        } else
            abort(404);
    }
}
