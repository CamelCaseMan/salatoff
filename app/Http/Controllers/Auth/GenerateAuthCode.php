<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\GenerateCodeRequest;

class GenerateAuthCode
{
    /**
     * Генерация кода при регистрации
     */
    public function generateCodeRegister(GenerateCodeRequest $request)
    {
        session()->forget('sms_code');
        $code = mt_rand(1000, 9999);
        session(['sms_code' => [
            $code => $request->phone]
        ]);
    }
}