<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'name' => 'required',
            'text' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Укажите свое имя",
            'text.required' => "Укажите текст отзыва",
            'text.size' => "Отзыв должен быть длиннее 12 символов",
        ];
    }
}
