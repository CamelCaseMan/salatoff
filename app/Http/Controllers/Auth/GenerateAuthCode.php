<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\SmsaeroApiV2;
use App\Http\Requests\Auth\GenerateCodeLoginRequest;
use App\Http\Requests\Auth\GenerateCodeRegisterRequest;

class GenerateAuthCode
{
    private $smsaeroApiV2;

    public function __construct(SmsaeroApiV2 $smsaeroApiV2)
    {
        $this->smsaeroApiV2 = $smsaeroApiV2;
    }

    /**
     * Генерация кода при регистрации
     */
    public function generateCodeRegister(GenerateCodeRegisterRequest $request)
    {
        session()->forget('sms_code');
        $code = mt_rand(1000, 9999);
        session(['sms_code' => [
            $code => $request->phone]
        ]);

        $this->sendMessage($request->phone, $code);
    }

    /**
     * Генерация кода при регистрации
     */
    public function generateCodeLogin(GenerateCodeLoginRequest $request)
    {
        session()->forget('sms_code');
        $code = mt_rand(1000, 9999);
        session(['sms_code' => [
            $code => $request->phone]
        ]);

        $this->sendMessage($request->phone, $code);
    }

    /**
     * @param string $phone
     * @param string $code
     * Отравка смс с кодом на телефон. Формат 70000000000
     */
    private function sendMessage(string $phone, string $code)
    {
        $phone = str_replace(array('+',), '', $phone);
        $this->smsaeroApiV2->send($phone, $code);
    }
}