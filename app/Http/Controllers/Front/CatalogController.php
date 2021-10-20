<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\EloquentCategoryRepository;

class CatalogController extends Controller
{
    private $categoryRepository;

    public function __construct(EloquentCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Получить все категории с подкатегориями
     */
    public function showPageCatalog()
    {
        $categories = $this->categoryRepository->getAll();
        return view('front.catalog.catalog', ['categories' => $categories]);
    }
}
