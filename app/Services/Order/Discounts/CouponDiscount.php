<?php

namespace App\Services\Order\Discounts;


class CouponDiscount implements DiscountInterface
{

    /**
     * @param float $total
     * @return float
     * Возвращаем величину скидки
     */
    public function setDiscount(double $total): double
    {
        $discount = $total - 50;
        dd(gettype($discount));
        return round($discount, 2);
    }
}