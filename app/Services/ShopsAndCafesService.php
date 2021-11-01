<?php

namespace App\Services;

use App\Repositories\EloquentCategoryRepository;
use App\Repositories\EloquentProductRepository;

class ShopsAndCafesService
{
    private $eloquentCategoryRepositories;
    private $eloquentProductsRepositories;

    public function __construct()
    {
        $this->eloquentCategoryRepositories = new EloquentCategoryRepository();
        $this->eloquentProductsRepositories = new EloquentProductRepository();
    }

    /**
     * @return array
     * Вывод список категорий в шапку
     */
    public function setMenuCatalog(): array
    {
        $menu = [
            'parents' => $this->eloquentCategoryRepositories->getParentCategory(),
            'children' => $this->eloquentCategoryRepositories->getChildrenCategory()
        ];
        return $menu;
    }

    /**
     * Отображаем категории для раздела магазины и кафе
     */
    public function getShopsAndCafes()
    {
        return $this->eloquentCategoryRepositories->getShopsAndCafes();
    }

    /**
     * @param string $parent
     * @param string $category
     * @return array
     * Получаем список товаров для раздела магазины и кафе
     */
    public function getProductsInCategoryShopAndCafes(string $parent, string $category)
    {
        $parent = $this->eloquentCategoryRepositories->findParent($parent);
        $category = $this->eloquentCategoryRepositories->findCategoryInParent($category, $parent->id);
        $products = $this->eloquentProductsRepositories->getAllProductsCategory($category->id);
        $info = [
            'category' => $category,
            'products' => $products,
        ];
        return $info;
    }

    /**
     * @param string $parent
     * @param string $category
     * @param string $product
     * @return array
     * Получаем данные по товару категории
     */
    public function getProductCategoryShopAndCafes(string $parent, string $category, string $product)
    {
        $parent = $this->eloquentCategoryRepositories->findParent($parent);
        $category = $this->eloquentCategoryRepositories->findCategoryInParent($category, $parent->id);
        $product = $this->eloquentProductsRepositories->findProductCategory($category->id, $product);
        $info = [
            'parent' => $parent,
            'category' => $category,
            'product' => $product,
        ];
        return $info;
    }

}