<?php

namespace App\Repositories;

use App\Models\Product as Model;

class EloquentProductRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }


    public function findProductCategory(string $category_id, string $slug)
    {
        return Model::where('category_id', $category_id)
            ->where('slug', $slug)
            ->where('show', 1)
            ->with('getAttributeProduct', 'getRecommendationsProducts')
            ->firstOrFail();
    }

    /**
     * @param string $category_id
     * @return mixed
     * Получаем список продуктов категории
     */
    public function getAllProductsCategory(string $category_id)
    {
        return Model::where('category_id', $category_id)
            ->with('getAttributeProduct')
            ->where('show', 1)
            ->get();
    }


}