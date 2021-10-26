<?php

namespace App\Http\Controllers\Front;


use App\Models\Product;

class CateringController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Показываем карточки товаров
     */
    public function showPageCategory()
    {
        $products = Product::where('category_id', 25)->get();
        return view('front.catering.category', ['products' => $products]);
    }

    /**
     * @param string $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Отображаем содержимое карточки
     */
    public function showPageProduct(string $product)
    {
        $product = Product::where('category_id', 25)
            ->where('slug', $product)
            ->firstOrFail();
        return view('front.catering.product', ['product' => $product]);
    }
}