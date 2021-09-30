<?php

namespace App\Services\Client;

use App\Services\Client\Repositories\EloquentOrdersRepository;
use App\Services\Client\Repositories\EloquentProfileRepository;
use Illuminate\Support\Facades\Hash;

class ClientService
{
    private $eloquentOrdersRepository;
    private $eloquentProfileRepository;

    public function __construct(EloquentOrdersRepository $eloquentOrdersRepository, EloquentProfileRepository $eloquentProfileRepository)
    {
        $this->eloquentOrdersRepository = $eloquentOrdersRepository;
        $this->eloquentProfileRepository = $eloquentProfileRepository;
    }

    public function getAllOrders(int $id)
    {
        return $this->eloquentOrdersRepository->getOrders($id);
    }

    public function updateProfile($id, $request)
    {
        $data = [
            'name' => $request['name'],
            'surname' => $request['surname'],
        ];
        $this->eloquentProfileRepository->updateProfile($id, $data);
    }

    public function updatePassword($id, $request)
    {
        $data = [
            'password_old' => $request['password_old'],
            'password' => Hash::make($request['password']),
        ];
        return $this->eloquentProfileRepository->updatePasswordUser($id, $data);
    }

}