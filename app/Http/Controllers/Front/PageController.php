<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Front\ReviewService;


class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Получить все категории с подкатегориями
     */
    public function showPage()
    {
        $url = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/') + 1);

        if (empty($url)) {
            $reviews = ReviewService::getReview();
            return view('front.page.main', compact('reviews'));
        }

        if (view()->exists('front.page.' . $url)) {
            return view('front.page.' . $url);
        } else {
            abort('404');
        }

    }

}
