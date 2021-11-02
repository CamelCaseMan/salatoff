<?php

namespace App\Http\Controllers\Front;

use App\Services\OtherCategories;

class OtherCategoriesController
{
    private $otherCategories;

    public function __construct(OtherCategories $otherCategories)
    {
        $this->otherCategories = $otherCategories;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Показываем карточки товаров
     */
    public function showPageCategory()
    {
        $category_url = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/') + 1);
        $products = $this->otherCategories->geListProductsCategory($category_url);
        return view('front.catering.category', ['products' => $products]);
    }

    /**
     * @param string $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Отображаем содержимое карточки
     */
    public function showPageProduct(string $product)
    {
        //Получаем урл категории
        $url = explode("/", parse_url(\Request::url())['path'])[1];
        $product = $this->otherCategories->getProduct($url, $product);
        return view('front.catering.product', ['product' => $product]);
    }
}