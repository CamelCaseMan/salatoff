<?php

namespace App\Providers;

use App\Services\Catalog\CatalogService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $category = new CatalogService();
        if (!is_null($category)) {
            $menu = $category->setMenuCatalog();
            View::share(
                [
                    'parents' => $menu['parents'],
                    'categories' => $menu['children'],
                ]
            );
        }
    }
}
