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
    ];

    public function getAttributeProduct()
    {
        return $this->hasOne(Attribute::class, 'product_id');
    }

    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        } else {
            return $this->price;
        }
    }
}
