<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CatalogController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\CateringController;
use App\Http\Controllers\Front\DinnerController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Basket\BasketController;
use App\Http\Controllers\Basket\FinishController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\OrderController as ManagerOrder;

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

// Каталог и карточки товара
Route::get('/', [PageController::class, 'showPage']);
Route::get('/shop', [CatalogController::class, 'showPageCatalog']);
Route::get('/shop/{parent}/{category}', [CategoryController::class, 'showPageCategory']);
Route::get('/shop/{parent}/{category}/{product}', [ProductController::class, 'showProduct']);
Route::get('/catering', [CateringController::class, 'showPageCategory']);
Route::get('/catering/{product}', [CateringController::class, 'showPageProduct']);
Route::get('/dinner', [DinnerController::class, 'showPageCategory']);
Route::get('/dinner/{product}', [DinnerController::class, 'showPageProduct']);


//Корзина
Route::prefix('basket')->group(function () {
    Route::get('/', [BasketController::class, 'showBasket']);
    Route::get('/finish/{id}', [FinishController::class, 'showFinishPage'])->name('basket.finish')->middleware(['role:client']);
    Route::post('/add', [BasketController::class, 'addProduct']);
    Route::post('/addcount', [BasketController::class, 'addCountProduct']);
    Route::post('/remove', [BasketController::class, 'removeOneProduct']);
    Route::post('/removeAll', [BasketController::class, 'removeProduct']);
});

/**
 * Shop - оформление заказа
 */
Route::namespace('Shop')->middleware(['auth'])->group(function () {
    Route::get('/save-order', [OrderController::class, 'orderConfirm'])->name('save.order');
    Route::get('/finish', 'FinishController@index')->name('finish');
});

/**
 * Личный кабинет клиента
 */
Route::prefix('client')->namespace('Client')->middleware(['role:client'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile');
    Route::get('/change-profile', 'ProfileController@changeInfo')->name('change.profile');
    Route::get('/change-password', 'ProfileController@changePassword')->name('change.password');
});


/**
 * Личный кабинет менеджера
 */
Route::prefix('manager')->middleware(['role:client'])->group(function () {
    Route::get('/', [ManagerController::class, 'showMainPage'])->name('profile');
    Route::get('/orders', [ManagerOrder::class, 'showOrderPage'])->name('manager.orders');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role:client');
