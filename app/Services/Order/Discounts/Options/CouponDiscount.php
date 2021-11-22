<?php

namespace App\Services\Order\Discounts\Options;

use App\Helpers\CuponHelper;
use App\Models\Cupon;
use App\Models\Order;
use App\Services\Order\Discounts\DiscountInterface;

class CouponDiscount implements DiscountInterface
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
        $data = CuponHelper::getValue($this->order->cupon_id, $total);
        return $data['value_discount'];
    }

}