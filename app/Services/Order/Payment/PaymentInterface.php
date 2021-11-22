<?php

namespace App\Services\Order\Payment;

use App\Models\Order;

interface PaymentInterface
{
    public function __construct(Order $order);

    /**
     * @return string
     * Возвращаем урл для оплаты
     */
    public function returnUrl(): string;
}