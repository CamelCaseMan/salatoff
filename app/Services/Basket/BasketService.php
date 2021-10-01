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
     * Получаем заказ клиента
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
     * @return mixed
     * Указываем нужное количества товара в корзине
     */
    public function addCountBasket(int $productId, int $count = 1)
    {
        $order = $this->createOrder();

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
        $order = $this->createOrder();

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

    /**
     * Получаем владельца заказ
     */
    public function saveUserOrder()
    {
        if (\Auth::check()) {
            return \Auth::id();
        } else {
            return null;
        }

    }

    /**
     * @return mixed
     */
    private function createOrder()
    {
        if (is_null($this->orderId)) {
            $order = Order::create([
                'user_id' => $this->saveUserOrder()]);
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($this->orderId);
        }

        return $order;
    }

    /**
     * @param int $id
     * @return array
     * Информация для фронта
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
}