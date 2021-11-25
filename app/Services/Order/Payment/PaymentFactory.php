<?php

namespace App\Services\Order\Payment;

use App\Models\Order;
use App\Services\Order\Payment\Options\OfflinePayment;
use App\Services\Order\Payment\Options\YooKassaPayment;

class PaymentFactory
{
    /**
     * @param Order $order
     * @param string $method
     * @return PaymentInterface
     * @throws \Exception
     * Получаем способ оплаты по его ID
     */
    public static function getPaymentMethod(Order $order, string $method): PaymentInterface
    {
        switch ($method) {
            case "Картой онлайн":
                return new YooKassaPayment($order);
            case "Картой при получении":
                return new OfflinePayment($order);
            case "Наличными курьеру":
                return new OfflinePayment($order);
            default:
                throw new \Exception("Unknown Payment Method");
        }
    }
}