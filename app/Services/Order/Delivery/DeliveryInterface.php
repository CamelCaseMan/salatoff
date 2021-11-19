<?php

namespace App\Services\Order\Delivery;

interface DeliveryInterface
{

    /**
     * @return float
     * Возращаем стоимость доставки
     */
    public function costOfDelivery(): float;
}