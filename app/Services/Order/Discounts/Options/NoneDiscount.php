<?php

namespace App\Services\Order\Discounts\Options;

use App\Models\Order;
use App\Services\Order\Discounts\DiscountInterface;

class NoneDiscount implements DiscountInterface
{

    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @param float $total
     * @return float
     * Возвращаем величину скидки
     */
    public function getDiscount(float $total): float
    {
        $discount = 0;
        return $discount;
    }

}