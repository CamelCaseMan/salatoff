<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Basket\BasketService;
use Illuminate\Http\Request;


class BasketController extends Controller
{
    /**
     * @param BasketService $basketService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Показываем страницу корзины
     */
    public function showBasket(BasketService $basketService)
    {
        $order = $basketService->getOrder();
        if (is_null($order)) {
            return view('front.basket.emptyBasket');
        }
        return view('front.basket.basket', compact('order'));
    }

    /**
     * @param BasketService $basketService
     * Добавляем сразу нужное число товаров в корзину
     */
    public function addCountProduct(BasketService $basketService)
    {
        $basketService->addCountBasket(33,0);
    }

    /**
     * @param int $productId
     * @param BasketService $basketService
     * Добавляем один товар в корзину
     */
    public function addProduct(int $productId, BasketService $basketService)
    {
        $basketService->addOneBasket($productId);

    }

    /**
     * @param int $productId
     * @param BasketService $basketService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Удаляем один товар из корзины
     */
    public function removeProduct(int $productId, BasketService $basketService)
    {
        $basketService->removeOneBasket($productId);
    }
}
