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
    public function saveOrder(array $data)
    {
        $this->name = $data['name'];
        $this->phone = $data['phone'];
        $this->status = 1;
        $this->total = $data['total'];
        $this->delivery = $data['delivery'];
        $this->user_id = \Auth::user()->id;
        $this->cupon_id = $data['cupon_id'];
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cupon()
    {
        return $this->belongsTo(Cupon::class);
    }

    /**
     * @return array
     * Формируем информацию о доставке
     */
    public function getInfoDelivery()
    {
        $info = [];

        $a = $this->delivery;

        foreach ($a as $key => $delivery) {
            if (!is_null($delivery)) {
                switch ($key) {
                    case 'entrance':
                        $name = 'Подъезд';
                        break;
                    case 'intercom':
                        $name = 'Домофон';
                        break;
                    case 'floor':
                        $name = 'Этаж';
                        break;
                    case 'flat':
                        $name = 'Квартира';
                        break;
                    case 'comment':
                        $name = 'Комментарий к заказу';
                        break;
                }
                $info[] = [
                    'name' => $name,
                    'value' => $delivery
                ];
            }
        }

        return $info;
    }
}
