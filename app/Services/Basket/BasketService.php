<?php

namespace App\Services\Basket;

use App\Models\Order;

class BasketService
{
    private $orderId;

    public function __construct()
    {
        $this->orderId = session('orderId');
    }

    /**
     * @return mixed
     * Получаем корзину
     */
    public function getOrder()
    {
        if (!is_null($this->orderId)) {
            return Order::findorFail($this->orderId);
        } else {
            return null;
        }
    }

    /**
     * @param int $productId
     * @param int $count
     * Указываем нужное количества товара в корзине
     */
    public function addCountBasket(int $productId, int $count = 1)
    {
        if (is_null($this->orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($this->orderId);
        }

        if ($order->products->contains($productId)) {
            $pivotTable = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($count == 0) {
                $order->products()->detach($productId);
            } else {
                $pivotTable->count = $count;
                $pivotTable->update();
            }

        } else {
            $order->products()->attach($productId, ['count' => $count]);
        }
    }

    /**
     * @param int $productId
     * Добавляем товар в корзину
     * Если есть - увеличиваем count
     */
    public function addOneBasket(int $productId)
    {
        if (is_null($this->orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($this->orderId);
        }

        if ($order->products->contains($productId)) {
            $pivotTable = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotTable->count++;
            $pivotTable->update();
        } else {
            $order->products()->attach($productId);
        }
    }

    /**
     * @param int $productId
     * Удаляем товар из корзины полностью
     * или уменьшаем на 1
     */
    public function removeOneBasket(int $productId)
    {
        $order = Order::find($this->orderId);

        if ($order->products->contains($productId)) {
            $pivotTable = $order->products()->where('product_id', $productId)->first()->pivot;

            if ($pivotTable->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotTable->count--;
                $pivotTable->update();
            }

        }
    }
}