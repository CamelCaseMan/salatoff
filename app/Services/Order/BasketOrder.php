<?php

namespace App\Services\Order;

use App\Models\Order;

/**
 * Class BasketOrder
 * @package App\Services\Order
 * Помощник для корзины
 */
class BasketOrder
{
    /**
     * @param int $id
     * @return array
     * Собираем информацию для фронта о состоянии корзины
     */
    public function setInfoOrder(int $id)
    {
        $order = Order::find($id);
        $info = [
            'total' => $order->getFullPrice(), //Сумма корзины
            'count' => $order->getCountProducts(), //Количество товаров в корзине
            'products' => $order->haveProductsOrder(), //Какие продукты в корзине и какое количество
            'success' => 'true'
        ];
        return $info;
    }

    /**
     * @return mixed
     */
    public function createOrder($orderId)
    {
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        return $order;
    }

    /**
     * @return mixed
     * Получаем заказ клиента
     */
    public function getOrder()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            return Order::findorFail($orderId);
        } else {
            return null;
        }
    }
}