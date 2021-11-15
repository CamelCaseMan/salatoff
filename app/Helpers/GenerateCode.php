<?php

namespace App\Helpers;


class GenerateCode
{
    /**
     * @param int $count_str | Длина строки
     * @return string
     * Генерация случайной строки
     */
    public static function generateCode(int $count_str)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $input_length = strlen($permitted_chars);
        $random_string = '';
        for($i = 0; $i < $count_str; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
}