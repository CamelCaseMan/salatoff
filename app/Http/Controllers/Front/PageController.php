<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;


class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Получить все категории с подкатегориями
     */
    public function showPage()
    {
        return view('front.page.main');
    }
}
