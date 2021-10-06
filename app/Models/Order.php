<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'total'
    ];

    protected $casts = [
        'delivery' => 'array'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    /**
     * @return int
     * Сумма товаров в корзине
     */
    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return round($sum, 2);
    }

    /**
     * @return int
     * Количество товаров в корзине
     */
    public function getCountProducts()
    {
        $count = 0;
        foreach ($this->products as $product) {
            $count = $product->getProductCount() + $count;
        }
        return $count;
    }

    public function haveProductsOrder()
    {
        $products = [];
        foreach ($this->products as $product) {
            $products[] = [
                'id' => $product->id,
                'count' => $product->getProductCount()
            ];

        }
        return $products;
    }

    /**
     * @param array $data
     * Сохраняем информацию по заказу
     */
    public function saveOrder(array $data, $order)
    {
        $cupon_value = $data['cupon'];
        $cupon = Cupon::where('value', $cupon_value)->first();
        if (!empty($cupon)) {
            $discount = ($order->getFullPrice() * $cupon->discount) / 100;
        }

        dd($discount);


        $this->name = $data['name'];
        $this->phone = $data['phone'];
        $this->status = 1;
        $this->total = $order->getFullPrice();
        $delivery = [
            'address' => $data['address'],
            'entrance' => $data['entrance'],
            'intercom' => $data['intercom'],
            'floor' => $data['floor'],
            'flat' => $data['flat'],
            'comment' => $data['comment'],
        ];
        $this->delivery = $delivery;
        $this->user_id = \Auth::user()->id;
        $this->save();
    }
}
