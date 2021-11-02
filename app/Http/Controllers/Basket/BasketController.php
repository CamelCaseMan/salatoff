<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Basket\BasketAddCountProductRequest;
use App\Http\Requests\Basket\BasketAddProductRequest;
use App\Http\Requests\Basket\RemoveOneProductRequest;
use App\Services\Basket\BasketService;
use App\Services\Basket\CartStatusService;
use App\Services\Order\BasketOrder;


class BasketController extends Controller
{
    private $basketOrder;

    public function __construct(BasketOrder $basketOrder)
    {
        $this->basketOrder = $basketOrder;
    }

    /**
     * @param BasketService $basketService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Показываем страницу корзины
     */
    public function showBasket(BasketService $basketService)
    {
        $order = $this->basketOrder->getOrder();
        if (is_null($order) || count($order->products) < 1) {
            return view('front.basket.emptyBasket');
        }
        return view('front.basket.basket', compact('order'));
    }

    /**
     * @param BasketAddProductRequest $basketAddProductRequest
     * @param BasketService $basketService
     * @return \Illuminate\Http\JsonResponse
     * Добавляем один товар в корзину
     */
    public function addProduct(BasketAddProductRequest $basketAddProductRequest, BasketService $basketService)
    {
        $order = $basketService->addOneBasket($basketAddProductRequest->productId);
        $info = $this->basketOrder->setInfoOrder($order->id);
        $this->setCount();
        return response()->json($info);
    }

    /**
     * @param BasketAddCountProductRequest $basketAddCountProductRequest
     * @param BasketService $basketService
     * @return \Illuminate\Http\JsonResponse
     * Добавляем сразу нужное число товаров в корзину
     */
    public function addCountProduct(BasketAddCountProductRequest $basketAddCountProductRequest, BasketService $basketService)
    {
        $order = $basketService->addCountBasket($basketAddCountProductRequest->productId, $basketAddCountProductRequest->count);
        $info = $this->basketOrder->setInfoOrder($order->id);
        $this->setCount();
        return response()->json($info);
    }


    /**
     * @param RemoveOneProductRequest $removeOneProductRequest
     * @param BasketService $basketService
     * @return \Illuminate\Http\JsonResponse
     * Уменьшаем количество товара на 1
     */
    public function removeOneProduct(RemoveOneProductRequest $removeOneProductRequest, BasketService $basketService)
    {
        $order = $basketService->removeOneBasket($removeOneProductRequest->productId);
        $info = $this->basketOrder->setInfoOrder($order->id);
        $this->setCount();
        return response()->json($info);
    }

    /**
     * @param RemoveOneProductRequest $removeOneProductRequest
     * @param BasketService $basketService
     * @return \Illuminate\Http\JsonResponse
     * Удаляем товар из корзины полностью
     */
    public function removeProduct(RemoveOneProductRequest $removeOneProductRequest, BasketService $basketService)
    {
        $order = $basketService->removeProduct($removeOneProductRequest->productId);
        $info = $this->basketOrder->setInfoOrder($order->id);
        $this->setCount();
        return response()->json($info);
    }

    /**
     * Храним состояние корзины
     */
    private function setCount()
    {
        session()->forget('basket_status');
        $cart_status = new CartStatusService();
        $basket_status = $cart_status->setStatusInfo();
        session(['basket_status' => $basket_status]);
    }


}
