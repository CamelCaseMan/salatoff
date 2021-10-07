<?php

namespace App\Http\Controllers\Order;

use App\Helpers\CuponHelper;
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
        $data = $this->prepareData($orderRequest->all(), $order);
        $order->saveOrder($data);
        session()->forget('orderId');
    }

    /**
     * @param array $data
     * @param $order
     * @return array
     * Подготавливаем данные для сохранения заказа
     * Считаем корзину с учетом купона
     */
    private function prepareData(array $data, $order):array
    {
        $cupon = new CuponHelper();
        $data['delivery'] = [
            'address' => $data['address'],
            'entrance' => $data['entrance'],
            'intercom' => $data['intercom'],
            'floor' => $data['floor'],
            'flat' => $data['flat'],
            'comment' => $data['comment'],
        ];
        $data['total'] = $order->getFullPrice() - $cupon->getDiscountValue($data['cupon'], $order);
        $data['cupon_id'] = $cupon->getIdCupon($data['cupon'], $order);
        return $data;
    }


}