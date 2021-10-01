<?php

namespace App\Helpers;

use App\Models\Product;

class CheckProduct
{
    /**
     * @param int $id
     * @return bool
     * Проверяем, не выключен ли товар (
     * Чтобы не добавить выключенный товар
     */
    public static function checkShowProduct(int $id): bool
    {
        $product = Product::where('id', $id)
            ->where('show', 1)
            ->first();

        if (is_null($product)) {
            return false;
        } else {
            return true;
        }
    }
}