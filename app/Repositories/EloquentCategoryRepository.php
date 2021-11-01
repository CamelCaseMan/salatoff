<?php

namespace App\Repositories;

use App\Models\Category as Model;

class EloquentCategoryRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return mixed
     * Показываем родительские категории меню в шапке
     */
    public function getParentCategory()
    {
        return Model::where('show', 1)
            ->where('parent_id', 0)
            ->where('id', '!=', 23)//Исключаем кейтеринг
            ->where('id', '!=', 24)//Комплексные обеды
            ->get();
    }

    /**
     * @return mixed
     * Показываем дочерниие категории для меню в шапке
     */
    public function getChildrenCategory()
    {
        return Model::where('show', 1)
            ->where('parent_id', '>', 0)
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * Получаем категории для раздела магазин и кафе
     */
    public function getShopsAndCafes()
    {
        return Model::where('show', 1)
            ->where('id', '!=', 23)//Исключаем кейтеринг
            ->where('id', '!=', 24)//Исключаем готовые обеды
            ->get();
    }

    /**
     * @param string $slug
     * @return mixed
     * Получаем данные по родительской категории с parent_id = 0
     */
    public function findParent(string $slug)
    {
        return Model::where('slug', $slug)
            ->first();
    }


    public function findCategoryInParent(string $slug, int $id)
    {
        return Model::where('slug', $slug)
            ->where('show', 1)
            ->where('parent_id', $id)
            ->first();
    }


}