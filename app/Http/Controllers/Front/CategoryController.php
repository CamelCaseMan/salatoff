<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\EloquentCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Получить все категории с подкатегориями
     */
    public function showPageCategory($parent, $category)
    {
        dd($parent,$category);
        //$produscts =
        return view('front.catalog.category');
    }
}
