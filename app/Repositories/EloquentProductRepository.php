<?php

namespace App\Repositories;

use App\Models\Product as Model;

class EloquentProductRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }


    public function findProductsCategory(string $category_id, string $slug)
    {
        return Model::where('category_id', $category_id)
            ->where('slug', $slug)
            ->with('getAttributeProduct')
            ->first();
    }

    public function getAllProductsCategory(string $category_id)
    {
        return Model::where('category_id', $category_id)
            ->with('getAttributeProduct')
            ->get();
    }

}