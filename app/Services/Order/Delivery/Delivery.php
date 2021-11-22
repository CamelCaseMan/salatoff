<?php

namespace App\Services\Order\Delivery;

use App\Models\Order;
use App\Services\Order\Delivery\Options\CourierDelivery;

class Delivery
{
    public static function setDelivery(string $method): DeliveryInterface
    {
        return new CourierDelivery();
    }
}