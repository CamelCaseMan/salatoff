<?php

namespace App\Services\Order\Payment\Options;

use App\Models\Order;
use App\Services\Order\Payment\PaymentInterface;
use App\Services\Payments\YooKassa;


class YooKassaPayment implements PaymentInterface
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    /**
     * @return string
     * Возвращаем урл для оплаты
     */
    public function returnUrl(): string
    {
        $payment = new YooKassa();
        $url = $payment->createPayment($this->order);
        return $url;
    }
}