<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckSmsCode implements Rule
{
    private $phone;

    /**
     * CheckSmsCode constructor.
     * @param string $phone
     */
    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param string $attribute
     * @param mixed $code
     * @return bool
     */
    public function passes($attribute, $code)
    {
        $sms = session('sms_code');

        if (is_null($sms)){
            return false;
        }

        //Проверяем есть ли такой код
        if (!array_key_exists($code, $sms)) {
            return false;
        }

        //Проверяем соответствие код -> номер
        if ($sms[$code] != $this->phone) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Введен не верный код подтверждения';
    }
}
