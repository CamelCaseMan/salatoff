<?php

namespace App\Services\Product\Repositories;

use App\Models\Product;

class EloquentProductRepositories
{

    public function getRecommendation(int $product_id)
    {
    $products = Product::where('id', $product_id)
        ->where('show', 1)
        ->get();
    }
}