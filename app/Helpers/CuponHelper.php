<?php

namespace App\Helpers;

use App\Models\Cupon;
use Carbon\Carbon;

class CuponHelper
{
    public static function getValue(int $id = null, $total = 0): array
    {
        if ($id == null) {
            $data = [
                'discount' => 0,
                'value_discount' => 0
            ];
        } else {
            $cupon = Cupon::find($id);
            $status = !Carbon::parse($cupon->expiration)->isPast();

            if ($status) {
                $data = [
                    'discount' => $cupon->discount,
                    'value_discount' => round(($total * $cupon->discount) / 100, 2)
                ];
            } else {
                $data = [
                    'discount' => 0,
                    'value_discount' => 0
                ];
            }
        }

        return $data;
    }
}