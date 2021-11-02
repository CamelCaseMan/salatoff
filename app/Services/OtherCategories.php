<?php

namespace App\Services;

use App\Repositories\EloquentCategoryRepository;
use App\Repositories\EloquentProductRepository;

class OtherCategories
{
    private $eloquentProductRepository;
    private $eloquentCategoryRepository;

    public function __construct(EloquentProductRepository $eloquentProductRepository, EloquentCategoryRepository $eloquentCategoryRepository)
    {
        $this->eloquentProductRepository = $eloquentProductRepository;
        $this->eloquentCategoryRepository = $eloquentCategoryRepository;
    }

    /**
     * @param string $category_url
     * @return mixed
     * Получаем все товары категории
     */
    public function geListProductsCategory(string $category_url)
    {
        $category = $this->eloquentCategoryRepository->findParent($category_url);
        $products = $this->eloquentProductRepository->getAllProductsCategory($category->id);
        return $products;
    }

    /**
     * @param string $category_url
     * @param string $product_slug
     * @return mixed
     * Получаем товар
     */
    public function getProduct(string $category_url, string $product_slug)
    {
        $category = $this->eloquentCategoryRepository->findParent($category_url);
        $product = $this->eloquentProductRepository->findProductCategory($category->id, $product_slug);
        return $product;
    }

}