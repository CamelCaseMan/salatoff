<?php

namespace App\Repositories;

use App\Models\Cupon;

class EloquentCuponsRepository
{
    public function findCupon(string $value)
    {
        $cupon = Cupon::where('value', $value)
            ->first();
        return $cupon;
    }
}