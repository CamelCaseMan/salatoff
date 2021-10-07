<?php

namespace App\Helpers;

use App\Models\Cupon;

class CuponHelper
{
    /**
     * @param string $cupon_value
     * @param $order
     * @return float
     */
    public function getDiscountValue(string $cupon_value, $order): float
    {
        $cupon = Cupon::where('value', $cupon_value)->first();

        if (!empty($cupon)) {
            $discount = ($order->getFullPrice() * $cupon->discount) / 100;
        } else {
            $discount = 0;
        }

        return rand($discount, 2);
    }

    /**
     * @param string $cupon_value
     * @param $order
     * @return int
     * Получаем ID купона
     */
    public function getIdCupon(string $cupon_value, $order): int
    {
        $cupon = Cupon::where('value', $cupon_value)->first();
        if (!empty($cupon)) {
            $id = $cupon->id;
        } else {
            $id = null;
        }
        return $id;
    }
}