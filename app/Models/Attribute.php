<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'nutrients',
        'energy',
        'composition',
        'implementation_period',
        'packaging',
    ];
}
