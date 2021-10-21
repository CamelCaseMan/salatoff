<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'parent_id',
        'show',
        'sort',
        'style'
    ];


    public function getSlug()
    {
        return $this->hasOne(Category::class,'parent_id');
    }
}
