<?php

namespace App\Http\Requests\Basket;

use App\Rules\CheckShowProduct;
use Illuminate\Foundation\Http\FormRequest;

class BasketAddCountProductRequest extends FormRequest
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
            'productId' => ['required', new CheckShowProduct()],
            'count' => ['required', 'integer', 'min:1'],
        ];
    }
}
