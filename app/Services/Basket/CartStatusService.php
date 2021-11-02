<?php

namespace App\Services\Basket;

use App\Repositories\EloquentBasketRepository;

/**
 * Class CartStatusService
 * @package App\Services\Basket
 * Получаем состояние корзины
 */
class CartStatusService
{
    private $orderId;
    private $eloquentBasketRepository;

    public function __construct()
    {
        $this->orderId = session('orderId');
        $this->eloquentBasketRepository = new EloquentBasketRepository();
    }

    /**
     * Собираем общую информацию о состоянии корзины
     */
    public function setStatusInfo()
    {
        if (!is_null($this->orderId)) {
            $order = $this->eloquentBasketRepository->findByIdOrder($this->orderId);
            $products_id = $this->getProducts_id($order);
            $products = $this->getProductsCount($order);
            $count = $this->getCountProducts($order);

            $info = [
                'products_id' => $products_id,
                'products' => $products,
                'count' => $count
            ];
        } else {
            $info = [
                'products_id' => null,
                'products' => null,
                'count' => 0
            ];
        }
        return $info;
    }

    /**
     * @param $order
     * @return array
     * Получаем id товаров в корзине
     */
    private function getProducts_id($order): array
    {
        $products_id = [];
        foreach ($order->haveProductsOrder() as $product) {
            $products_id[] = $product['id'];
        }

        return $products_id;
    }

    /**
     * @param $order
     * @return array
     * Какие товары в корзине и сколько
     */
    private function getProductsCount($order): array
    {
        $products = [];
        foreach ($order->haveProductsOrder() as $product) {
            $products[$product['id']] = $product['count'];
        }
        return $products;
    }

    /**
     * @param $order
     * @return int
     * Считаем количество товара в корзине
     */
    private function getCountProducts($order): int
    {
        $count = 0;
        foreach ($order->haveProductsOrder() as $product) {
            $count = $count + $product['count'];
        }
        return $count;
    }

}