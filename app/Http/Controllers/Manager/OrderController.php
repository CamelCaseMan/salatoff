<?php

namespace App\Http\Controllers\Manager;


use App\Models\Order;

class OrderController
{
    public function showOrderPage()
    {
        $orders = Order::orderBy('id', 'DESC')
            ->where('status', '1')
            ->paginate(35);
        return view('manager.orders.orders', compact('orders'));
    }

}