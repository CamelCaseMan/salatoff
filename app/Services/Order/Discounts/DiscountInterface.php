<?php

namespace App\Services\Order\Discounts;

use App\Models\Order;

interface DiscountInterface
{

    public function __construct(Order $order);

    /**
     * @param float $total
     * @return float
     * Возвращаем величину скидки
     */
    public function getDiscount(float $total): float;
}