<?php

namespace App\Services\Order\Payment;

use App\Models\Order;
use App\Services\Order\Payment\Options\OfflinePayment;
use App\Services\Order\Payment\Options\YooKassaPayment;

class PaymentFactory
{
    /**
     * @param Order $order
     * @param string $mthod
     * @return PaymentInterface
     * @throws \Exception
     * Получаем способ оплаты по его ID
     */
    public static function getPaymentMethod(Order $order, string $mthod): PaymentInterface
    {
        switch ($mthod) {
            case "online":
                return new YooKassaPayment($order);
            case "offline":
                return new OfflinePayment($order);
            default:
                throw new \Exception("Unknown Payment Method");
        }
    }
}