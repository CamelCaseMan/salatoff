<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
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
     * @param string $name
     * @param string $phone
     * Сохраняем информацию по заказу
     */
    public function saveOrder(string $name, string $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->status = 1;
        $this->save();
        session()->forget('orderId');
    }

}
