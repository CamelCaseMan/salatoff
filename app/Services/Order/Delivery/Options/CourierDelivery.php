<?php

namespace App\Services\Order\Delivery\Options;

use App\Services\Order\Delivery\DeliveryInterface;

class CourierDelivery implements DeliveryInterface
{
    /**
     * @return float
     * Возращаем стоимость доставки
     */
    public function costOfDelivery(): float
    {
        $price = config('delivery.courier');
        return $price;
    }
}