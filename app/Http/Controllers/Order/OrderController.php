<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Подтверждение заказа
     */
    public function orderConfirm(OrderRequest $orderRequest)
    {
        $orderID = session('orderId');

        if ($orderID == null) {
            return view('front.basket.emptyBasket');
        }

        $order = Order::find($orderID);
        $order->saveOrder($orderRequest->name, $orderRequest->phone);
    }

    /**
     * Сохраняем заказ
     */
    public function saveOrder(Request $request)
    {
        dd($request->all());
    }
}