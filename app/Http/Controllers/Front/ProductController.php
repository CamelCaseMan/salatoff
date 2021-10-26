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

    public function showProduct(string $parent, string $category, $product)
    {
        $parent = $this->categoryRepository->findParent($parent);
        $category = $this->categoryRepository->findCategoryInParent($category, $parent->id);
        $product = $this->productRepository->findProductsCategory($category->id, $product);
        return view('front.products.product', ['category' => $category, 'product' => $product, 'parent' => $parent]);
    }
}
