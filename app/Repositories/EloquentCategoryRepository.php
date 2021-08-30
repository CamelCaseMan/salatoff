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
        return Model::with('childrenCategories')->get();
    }

    public function getCategory(string $slug)
    {
        return Model::where('slug', $slug)->first();
    }

    public function findParentCategory(string $parent_id, string $slug)
    {
        return Model::where('parent_id', $parent_id)
            ->where('slug', $slug)
            ->first();
    }

}