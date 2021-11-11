<?php

namespace App\Repositories;

use App\Models\User;

class EloquentUserRepository
{

    /**
     * @param int $id
     * @param array $data
     * Обновление профиля клиента
     */
    public function updateProfile(int $id, array $data)
    {
        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
    }


}