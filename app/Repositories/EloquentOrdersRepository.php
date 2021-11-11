<?php

namespace App\Repositories;

use App\Models\Order;

class EloquentOrdersRepository
{
    /**
     * @param int $id
     * @return mixed
     * Получаем заказы текущего клиента
     */
    public function getOrders(int $id)
    {
        $result = Order::where('user_id', $id)
            ->where('status', '1')
            ->get();
        return $result;
    }

}