<?php

namespace App\Services\Order\Payment\Options;

use App\Models\Order;
use App\Services\Order\Payment\PaymentInterface;

class YooKassaPayment implements PaymentInterface
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function prepareData()
    {

    }

    /**
     * @return string
     * Возвращаем урл для оплаты
     */
    public function returnUrl(): string
    {
        return '';
    }
}