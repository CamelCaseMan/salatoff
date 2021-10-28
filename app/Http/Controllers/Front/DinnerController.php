<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;

class DinnerController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Показываем карточки товаров
     */
    public function showPageCategory()
    {
        $products = Product::where('category_id', 24)
            ->where('show', 1)
            ->get();
        return view('front.dinner.category', ['products' => $products]);
    }

    /**
     * @param string $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Отображаем содержимое карточки
     */
    public function showPageProduct(string $product)
    {
        $product = Product::where('category_id', 24)
            ->where('show', 1)
            ->where('slug', $product)
            ->firstOrFail();
        return view('front.dinner.product', ['product' => $product]);
    }
}