<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function sendReview(ReviewRequest $request)
    {
        Review::create($request->all());
        return response()->json(['message' => 'success']);
    }
}
