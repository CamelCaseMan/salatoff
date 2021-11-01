<?php

namespace App\Services\Catalog\Repositories;

use App\Models\Category;

class EloquentCatalogRepositroies
{
    public function getParentCategory()
    {
        return Category::where('show', 1)
            ->where('parent_id', 0)
            ->where('id', '!=', 23)//Исключаем кейтеринг
            ->where('id', '!=', 24)//Комплексные обеды
            ->get();
    }

    public function getChildrenCategory()
    {
        return Category::where('show', 1)
            ->where('parent_id', '>', 0)
            ->get();
    }

}