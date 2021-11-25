<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total',
        'status',
        'name',
        'phone',
        'organization',
        'email',
        'delivery_date',
        'cupon_id',
        'delivery'
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
        $delivery = $this->delivery;

        $info = [
            'Метод оплаты' => $delivery['card'] ?? null,
            'Город' => $delivery['city'] ?? null,
            'Улица' => $delivery['street'] ?? null,
            'Дом' => $delivery['home'] ?? null,
            'Этаж' => $delivery['floor'] ?? null,
            'Офис' => $delivery['office'] ?? null,
            'Подъезд' => $delivery['entrance'] ?? null,
            'Комментарий' => $delivery['comment'] ?? null,

        ];

        return $info;
    }
}
