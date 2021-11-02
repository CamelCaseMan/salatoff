<?php

namespace App\Repositories;

use App\Models\Order as Model;
use App\Models\Order;

class EloquentBasketRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param int $id
     * Поиск заказа по id
     */
    public function findByIdOrder(int $id)
    {
         return Order::find($id);
    }
}