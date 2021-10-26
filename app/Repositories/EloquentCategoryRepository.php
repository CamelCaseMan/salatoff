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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return Model::where('show', 1)
            ->where('id', '!=', 25)//Исключаем кейтеринг
            ->get();
    }

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