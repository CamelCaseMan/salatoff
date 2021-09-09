<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\EloquentCategoryRepository;
use App\Repositories\EloquentProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;

    public function __construct(EloquentProductRepository $productRepository, EloquentCategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param $parent
     * @param null $children
     * @param null $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Поиск метода отображения
     * Если есть подкатегории отображаем
     * Если подкатегории нет - отображаем товар
     */
    public function findMethodShow($parent, $children = null, $product = null)
    {

        $category = $this->categoryRepository->getCategory($parent);

        if ($category == null) {
            abort('404');
        }

        //Поиск дочерней категории или отображаем товар
        if ($children !== null) {
            $parent = $category;
            $category = $this->categoryRepository->findParentCategory($parent->id, $children);

            if ($product !== null) {
                return $this->showOneProduct($category->id, $product);
            }

            if ($category == null) {
                return $this->showOneProduct($parent->id, $children);
            }
        }
        $category_name = isset($parent->name) ? $parent->name . '/' . $category->name : $category->name;

        return $this->showAllProducts($category_name, $category->id);
    }

    /**
     * @param string $category_name
     * @param string $category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Показываем все товары категории
     */
    public function showAllProducts(string $category_name, string $category_id)
    {
        $products = $this->productRepository->getAllProductsCategory($category_id);
        return view('front.products.products', ['category_name' => $category_name, 'products' => $products]);
    }


    /**
     * @param $category_id
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Показываем товар
     */
    public function showOneProduct($category_id, $slug)
    {
        $product = $this->productRepository->findProductsCategory($category_id, $slug);

        if ($product == null) {
            abort('404');
        }

        return view('front.products.product', ['product' => $product]);
    }
}
