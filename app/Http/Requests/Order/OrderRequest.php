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
            'name' => 'required',
            'phone' => 'required',
            'delivery_date' => 'required',
            'payment' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Поле имя обязательно",
            'phone.required' => "Поле телефон обязательно",
            'delivery_date.required' => "Поле дата доставки обязательно",
        ];
    }

    /**
     * @return array
     * Подготовливаем данные
     */
    public function prepareData()
    {
        $data = [
            'name' => $this->name,
            'phone' => $this->phone,
            'organization' => $this->organization,
            'email' => $this->email,
            'delivery_date' => $this->delivery_date,
            'delivery' => $this->prepareDelivery(),
        ];

        return $data;
    }

    /**
     * Подготовка данных о доставке
     */
    private function prepareDelivery()
    {
        $delivery = [
            'city' => $this->city,
            'street' => $this->street ?? null,
            'home' => $this->home?? null,
            'entrance' => $this->entrance?? null,
            'floor' => $this->floor?? null,
            'office' => $this->office?? null,
            'payment' => $this->payment,
            'comment' => $this->comment?? null,
        ];
        return $delivery;
    }
}
