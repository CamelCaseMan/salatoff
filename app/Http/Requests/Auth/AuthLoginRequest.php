<?php

namespace App\Http\Requests\Auth;

use App\Rules\CheckSmsCode;
use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => ['required'],
            /*'code' => ['required', new CheckSmsCode()],*/
        ];
    }
}
