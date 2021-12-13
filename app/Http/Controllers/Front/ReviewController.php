<?php

namespace App\Http\Controllers\Front;

use App\Helpers\GenerateCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\ReviewRequest;
use App\Mail\ReviewMail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
    public function sendReview(ReviewRequest $request)
    {
        $data = [
            'name' => $request->name,
            'text' => $request->name,
            'code' => GenerateCode::generateCode(16)
        ];

        $review = Review::create($data);
        Mail::to(config('shop.admin_email'))
            ->send(new ReviewMail($review));
        return response()->json(['message' => 'success']);
    }

    public function includeReview(int $id, string $code)
    {
        $review = Review::where('id', $id)
            ->where('code', $code)
            ->where('status', false)
            ->first();
        if ($review) {
            $review->status = 1;
            $review->update();
            echo "Отзыв добавлен";
        } else {
            echo "Что то пошло не так! Сообщите в поддержку";
        }
    }


}
