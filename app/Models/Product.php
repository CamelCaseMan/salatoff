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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Получаем три рекомендуемых товара для карточки
     */
    public function getRecommendationsProducts()
    {
        return $this->belongsToMany(Product::class, 'product_recommendations', 'product_id', 'recommendation_product_id')->take(3)->where('show', 1);
    }

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


}
