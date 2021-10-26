<?php

namespace App\Services\Catalog;

use App\Services\Catalog\Repositories\EloquentCatalogRepositroies;

class CatalogService
{
    private $eloquentCatalogRepositories;

    public function __construct()
    {
        $this->eloquentCatalogRepositories = new EloquentCatalogRepositroies();
    }

    public function setMenuCatalog()
    {
        $menu = [
            'parents' => $this->eloquentCatalogRepositories->getParentCategory(),
            'children' => $this->eloquentCatalogRepositories->getChildrenCategory()
        ];
        return $menu;
    }

}