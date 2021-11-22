<?php

namespace App\Services\Order\Discounts;

use App\Models\Order;
use App\Services\Order\Discounts\Options\CouponDiscount;
use App\Services\Order\Discounts\Options\NoneDiscount;

class Discount
{
    public static function setDiscount(Order $order): DiscountInterface
    {
        if (!is_null($order->cupon_id)) {
            return new CouponDiscount($order);
        } else {
            return new NoneDiscount($order);
        }
    }
}