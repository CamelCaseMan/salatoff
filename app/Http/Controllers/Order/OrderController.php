<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\OrderRequest;
use App\Models\Order;
use App\Services\Order\Discounts\CouponDiscount;
use App\Services\Order\Discounts\DiscountInterface;


class OrderController
{
    private function setDiscount(string $method): DiscountInterface
    {
        switch ($method) {
            case "Картой онлайн":
                return new CouponDiscount();
            default:
                throw new \Exception("Unknown Discount Method");
        }
    }

    /**
     * @param OrderRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     * Валидируем и сохраняем заказ
     */
    public function orderConfirm(OrderRequest $request)
    {
        $orderID = session('orderId');

        if ($orderID == null) {
            return view('front.basket.emptyBasket');
        }


        $order = Order::find($orderID);
        $data = $request->prepareData();

        $a = (double)$order->getFullPrice();
       // dd(gettype($a));

        $discount = $this->setDiscount($data['delivery']['card']);
        $total = $discount->setDiscount($a);
        dd();

        //$order->saveOrder($delivery);
        session()->forget('orderId');
        return redirect()->route('basket.finish', [$order]);
    }

    /**
     * @param array $data
     * @param \App\Models\Order $order
     * @return array
     * Подготавливаем данные для сохранения заказа
     * Считаем корзину с учетом купона
     */
    /*    private function prepareData(array $data, $order): array
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
        }*/


}