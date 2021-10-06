<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'phone' => 'required', 'string',
            'address' => 'required', 'string',
            'payment_method' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Укажите имя контактного лица, отвественного за доставку!",
            'phone.required' => "Укажите номер телефона, лица отвественного за доставку!",
            'address.required' => "Поле адрес обязательно!",
        ];
    }
}
