<?php

namespace App\Http\Controllers\Auth;

class GenerateAuthCode
{
    /**
     * Генерация кода при регистрации
     */
    public function generateCodeRegister()
    {
        session()->forget('login_code');
        $code = mt_rand(1000, 9999);
        session(['login_code' => $code]);
    }
}