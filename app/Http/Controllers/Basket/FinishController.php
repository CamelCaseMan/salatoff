<?php

namespace App\Http\Controllers\Basket;

use App\Http\Requests\Basket\BasketFinishRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\Order\BasketOrder;

class FinishController
{
    private $basketOrder;

    public function __construct(BasketOrder $basketOrder)
    {
        $this->basketOrder = $basketOrder;
    }
    /**
     * Показываем страницу о успешном заказе
     */
    public function showFinishPage(BasketFinishRequest $request)
    {
        dd($request->all());
        $user = \Auth::user();
        $order = Order::findOrFail($id);
        if ($order->user_id == $user->id){
            return view('front.basket.finish', ['user' => $user, 'order' => $order]);
        }else{
            abort('404');
        }
    }
}