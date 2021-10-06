<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\OrderRequest;
use App\Models\Order;


class OrderController
{
    /**
     * @param OrderRequest $orderRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Валидируем и сохраняем заказ
     */
    public function orderConfirm(OrderRequest $orderRequest)
    {
        $orderID = session('orderId');

        if ($orderID == null) {
            return view('front.basket.emptyBasket');
        }

        $order = Order::find($orderID);
        $order->saveOrder($orderRequest->all(), $order);
        session()->forget('orderId');
    }


}