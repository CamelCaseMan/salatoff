<?php

namespace App\Http\Controllers\Basket;

use App\Helpers\CheckProduct;
use App\Http\Controllers\Controller;

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
     * @param int $productId
     * @param BasketService $basketService
     * @return \Illuminate\Http\JsonResponse
     * Добавляем один товар в корзину
     */
    public function addProduct(int $productId, BasketService $basketService)
    {
        if (CheckProduct::checkShowProduct($productId)) {
            $order = $basketService->addOneBasket($productId);
            $info = $basketService->setInfoOrder($order->id);
            return response()->json($info);
        } else {
            return response()->json([
                'success' => 'false'
            ]);
        }
    }

    /**
     * @param BasketService $basketService
     * @return \Illuminate\Http\JsonResponse
     * Добавляем сразу нужное число товаров в корзину
     */
    public function addCountProduct(BasketService $basketService)
    {
        $productId = 32;
        $count = 21;

        if (CheckProduct::checkShowProduct($productId)) {
            $order = $basketService->addCountBasket($productId, $count);
            $info = $basketService->setInfoOrder($order->id);
            return response()->json($info);
        } else {
            return response()->json([
                'success' => 'false'
            ]);
        }
    }


    /**
     * @param int $productId
     * @param BasketService $basketService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Удаляем один товар из корзины
     */
    public function removeOneProduct(int $productId, BasketService $basketService)
    {
        $order = $basketService->removeOneBasket($productId);
        $info = $basketService->setInfoOrder($order->id);
        return response()->json($info);
    }

    public function removeProduct(int $productId, BasketService $basketService)
    {
        $order = $basketService->removeOneBasket($productId);
        $info = $basketService->setInfoOrder($order->id);
        return response()->json($info);
    }


}
