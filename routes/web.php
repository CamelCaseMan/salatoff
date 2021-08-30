<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


// CATALOG & PRODUCT
Route::get('/', [CategoryController::class, 'showAllCategories']);
Route::get('/catalog/{parent}/{children?}/{product?}', [ProductController::class, 'findMethodShow']);
//Route::get('/catalog/{parent}/{children?}/{product}', [ProductController::class, 'findMethodShow']);

/*Route::get('/', 'Shop\MainController@index')->name('shop.main');
Route::get('/catalog/{slug}', 'Shop\CatalogController@show')->name('shop.category');
Route::get('/catalog', 'Shop\CatalogController@showCatalog')->name('shop.catalog');
Route::get('/product/{productSlug}', 'Shop\ProductController@show')->name('shop.product');*/

