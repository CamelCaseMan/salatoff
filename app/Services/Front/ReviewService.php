<?php

namespace App\Services\Front;

use App\Models\Review;

class ReviewService
{
    /**
     * @return mixed
     * Отображаем последние опубликованные отзывы
     */
    public static function getReview()
    {
        $reviews = Review::where('status', 1)
            ->orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        return $reviews;
    }
}