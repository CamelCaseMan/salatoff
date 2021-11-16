<?php

namespace App\Providers;

use App\Services\ShopsAndCafesService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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


        if (\Schema::hasTable('categories')) {
            $category = new ShopsAndCafesService();

            if (isset($category)) {
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
}
