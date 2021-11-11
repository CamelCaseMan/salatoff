<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Validation\Rule;

class ChangeProfileRequest extends FormRequest
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
            'name' => 'required', 'string',
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Поле имя обязательно!",
            'email.email' => "Укажите правильный формат почты",
        ];
    }
}
