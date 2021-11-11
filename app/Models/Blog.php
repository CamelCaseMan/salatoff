<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function getSeo()
    {
        return $this->belongsTo(Seo::class,'seo_id');
    }
}
