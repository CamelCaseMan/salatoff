<?php

namespace App\Services\Order;


use App\Models\Order;
use App\Repositories\EloquentCuponsRepository;
use App\Repositories\EloquentOrdersRepository;

class OrderService
{
    private $cuponsRepository;
    private $ordersRepository;

    public function __construct(EloquentCuponsRepository $cuponsRepository, EloquentOrdersRepository $ordersRepository)
    {
        $this->cuponsRepository = $cuponsRepository;
        $this->ordersRepository = $ordersRepository;
    }

    public function updateInfoNotConfirmedOrder(Order $order, array $data)
    {
        //Получаем id купона
        if (!is_null($data['cupon'])) {
            $id = $this->cuponsRepository->findCuponId($data['cupon']);
            $data['cupon_id'] = $id;
        }
        $this->ordersRepository->updateInfoOrder($order, $data);
    }

    public function updateInfoConfirmedOrder(Order $order, array $data)
    {
        $data['user_id'] = \Auth::user()->id ?? null;
        $data['status'] = 1;
        $this->ordersRepository->updateInfoOrder($order, $data);
    }
}