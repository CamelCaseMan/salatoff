<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\EloquentCategoryRepository;
use App\Repositories\EloquentProductRepository;

class CategoryController extends Controller
{
    private $productRepository;
    private $categoryRepository;

    public function __construct(EloquentProductRepository $productRepository, EloquentCategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param string $parent
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Выводим товары категории
     */
    public function showPageCategory(string $parent, string $category)
    {
        $parent = $this->categoryRepository->findParent($parent);
        $category = $this->categoryRepository->findCategoryInParent($category, $parent->id);
        $products = $this->productRepository->getAllProductsCategory($category->id);
        return view('front.catalog.category', ['category' => $category, 'products' => $products]);
    }

}
