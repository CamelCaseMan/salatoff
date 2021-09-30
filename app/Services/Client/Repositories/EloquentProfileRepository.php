<?php

namespace App\Services\Client\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentProfileRepository
{
    public function updateProfile(int $id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
    }

    public function updatePasswordUser(int $id, array $data)
    {
        $user = User::findOrFail($id);

        if (Hash::check($data['password_old'], $user->password)) {
            $user->update($data);
            return true;
        } else {
            return false;
        }

    }
}