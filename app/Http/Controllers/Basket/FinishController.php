<?php

namespace App\Http\Controllers\Basket;


use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class FinishController
{
    /**
     * Показываем страницу о успешном заказе
     */
    public function showFinishPage(int $id)
    {
        $user = \Auth::user();
        $order = Order::findOrFail($id);
        if ($order->user_id == $user->id){
            return view('front.basket.finish', ['user' => $user, 'order' => $order]);
        }else{
            abort('404');
        }
    }
}