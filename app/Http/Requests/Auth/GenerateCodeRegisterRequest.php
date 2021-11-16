<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class GenerateCodeRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => [
                'bail',
                'required',
                'unique:users',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
            ],
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => "Номер телефона обязательное поле",
            'phone.unique' => "Данный номер уже зарегистрирован",
            'phone.regex' => "Укажите правильный формат номера",
        ];
    }
}
