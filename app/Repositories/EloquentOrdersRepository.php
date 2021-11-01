<?php

namespace App\Services\Client\Repositories;

use App\Models\Order;
use App\Models\OrdersProducts;

class EloquentOrdersRepository
{
    public function getOrders(int $id)
    {
        $result = Order::where('user_id', $id)->get();
        return $result;
    }


}