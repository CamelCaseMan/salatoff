<?php

namespace App\Repositories;

use App\Models\Cupon;

class EloquentCuponsRepository
{
    public function findCuponId(string $value)
    {
        $cupon = Cupon::where('value', $value)
            ->first();
        return $cupon->id;
    }
}