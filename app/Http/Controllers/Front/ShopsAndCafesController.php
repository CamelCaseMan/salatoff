<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\ShopsAndCafesService;
use MetaTag;

/**
 * Class ShopsAndCafesController
 * @package App\Http\Controllers\Front
 * Функционал раздела кафе и магазины
 */
class ShopsAndCafesController extends Controller
{
    private $shopsAndCafesService;

    public function __construct(ShopsAndCafesService $shopsAndCafesService)
    {
        $this->shopsAndCafesService = $shopsAndCafesService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Отображаем все категории для раздела кафе и магазины
     */
    public function showPageCatalog()
    {
        $categories = $this->shopsAndCafesService->getShopsAndCafes();
        return view('front.shops_and_cafes.catalog', ['categories' => $categories]);
    }

    /**
     * @param string $parent
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Выводим товары в разделе кафе и магазины
     */
    public function showProductInCategory(string $parent, string $category)
    {
        $info = $this->shopsAndCafesService->getProductsInCategoryShopAndCafes($parent, $category);

        MetaTag::setTags([
            'title' => $info['category']->getSeo->title ?? null,
            'description' => $info['category']->getSeo->description ?? null,
        ]);

        return view('front.shops_and_cafes.category', ['category' => $info['category'], 'products' => $info['products']]);
    }

    /**
     * @param string $parent
     * @param string $category
     * @param string $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Отображаем карточку товара в разделе кафе и магазины
     */
    public function showCardProduct(string $parent, string $category, string $product)
    {
        $info = $this->shopsAndCafesService->getProductCategoryShopAndCafes($parent, $category, $product);

        MetaTag::setTags([
            'title' => $info['category']->getSeo->title ?? null,
            'description' => $info['category']->getSeo->description ?? null,
        ]);

        return view('front.shops_and_cafes.product', ['category' => $info['category'], 'product' => $info['product'], 'parent' => $info['parent']]);
    }
}
