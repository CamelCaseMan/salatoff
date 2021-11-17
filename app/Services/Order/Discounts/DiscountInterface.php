<?php

namespace App\Services\Order\Discounts;

interface DiscountInterface
{
    /**
     * @param float $total
     * @return float
     * Возвращаем величину скидки
     */
    public function setDiscount(double $total): double;
}