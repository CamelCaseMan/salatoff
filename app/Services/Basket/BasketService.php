<?php

namespace App\Services\Basket;

use App\Models\Order;
use App\Services\Order\BasketOrder;

/**
 * Class BasketService
 * @package App\Services\Basket
 * Добавляем / удаляем товар из корзины
 */
class BasketService
{
    private $orderId;
    private $basketOrder;

    public function __construct(BasketOrder $basketOrder)
    {
        $this->orderId = session('orderId');
        $this->basketOrder = $basketOrder;
    }

    /**
     * @param int $productId
     * @param int $count
     * @return mixed
     * Указываем нужное количества товара в корзине
     */
    public function addCountBasket(int $productId, int $count = 1)
    {
        $order = $this->basketOrder->createOrder($this->orderId);

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
        return $order;
    }

    /**
     * @param int $productId
     * @return mixed
     * Добавляем товар в корзину
     * Если есть - увеличиваем count
     */
    public function addOneBasket(int $productId)
    {
        $order = $this->basketOrder->createOrder($this->orderId);

        if ($order->products->contains($productId)) {
            $pivotTable = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotTable->count++;
            $pivotTable->update();
        } else {
            $order->products()->attach($productId);
        }
        return $order;
    }

    /**
     * @param int $productId
     * @return mixed
     * Удаляем один товар из корзины
     * Или полностью, если меньше 1
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
            return $order;
        }
    }

    /**
     * @param int $productId
     * @return mixed
     * Удаляем товар полностью из корзины
     */
    public function removeProduct(int $productId)
    {
        $order = Order::find($this->orderId);
        $order->products()->detach($productId);
        return $order;
    }

}