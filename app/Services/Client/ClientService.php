<?php

namespace App\Services\Client;

use App\Repositories\EloquentOrdersRepository;
use App\Repositories\EloquentUserRepository;


class ClientService
{
    private $eloquentOrdersRepository;
    private $eloquentUserRepository;

    public function __construct(EloquentOrdersRepository $eloquentOrdersRepository, EloquentUserRepository $eloquentUserRepository)
    {
        $this->eloquentOrdersRepository = $eloquentOrdersRepository;
        $this->eloquentUserRepository = $eloquentUserRepository;
    }

    public function getAllOrders(int $id)
    {
        return $this->eloquentOrdersRepository->getOrders($id);
    }

    public function updateProfile($id, $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
        ];
        $this->eloquentUserRepository->updateProfile($id, $data);
    }


}