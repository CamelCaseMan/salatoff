<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\OrderRequest;
use App\Models\Order;
use App\Services\Order\Delivery\Delivery;
use App\Services\Order\Discounts\Discount;
use App\Services\Order\OrderService;


class OrderController
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @param OrderRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     * Валидируем и сохраняем заказ
     */
    public function orderConfirm(OrderRequest $request)
    {
        session()->forget('success_order_id');
        $orderID = session('orderId');

        if ($orderID == null) {
            return view('front.basket.emptyBasket');
        }

        //Подготавливаем данные заказа
        $order = Order::find($orderID);
        $data = $request->prepareData();
        $total = $order->getFullPrice();

        //считаем сумму с учетом скидки
        $discount = Discount::setDiscount($order);
        $data['total'] = $total - $discount->getDiscount($total);

        //Считаем стоимость доставки
        $delivery = Delivery::setDelivery('courier');
        $data['total'] = $total + $delivery->costOfDelivery();

        //Сохраняем заказ
        $this->orderService->updateInfoConfirmedOrder($order, $data);

        //Обрабатываем метод оплаты
       // dd($data);


        session(['success_order_id' => $orderID]);
        session()->forget('basket_status');
        session()->forget('orderId');

        return redirect()->route('basket.success');
    }

    private function redirectClient()
    {

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Страница успешного заказа
     *
     */
    public function success()
    {
        $orderID = session('success_order_id');

        if ($orderID == null) {
            return redirect()->route('front.home');
        }

        $order = Order::find($orderID);

        session()->forget('success_order_id');
        return view('front.basket.success', compact('order'));

    }


}