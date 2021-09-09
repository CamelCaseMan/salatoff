<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\BasketController;

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

//BASKET
Route::get('/basket', [BasketController::class, 'showBasket']);
Route::get('/basket/add/{productId}', [BasketController::class, 'addProduct']);
Route::get('/basket/addcount/{productId}', [BasketController::class, 'addCountProduct']);
Route::get('/basket/remove/{productId}', [BasketController::class, 'removeProduct']);




