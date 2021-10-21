<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'price',
        'show',
        'image',
        'weight'
    ];

    public function getAttributeProduct()
    {
        return $this->hasOne(Attribute::class, 'product_id');
    }

    /**
     * Считаем цену товара
     */
    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        } else {
            return $this->price;
        }
    }

    /**
     * @return int
     * Получаем количество товара в корзине
     */
    public function getProductCount(): int
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count;
        }
    }
}
