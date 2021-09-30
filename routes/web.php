<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\BasketController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Manager\ManagerController;

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

// CATALOG & PRODUCT
Route::get('/', [CategoryController::class, 'showAllCategories']);
Route::get('/catalog/{parent}/{children?}/{product?}', [ProductController::class, 'findMethodShow']);

//BASKET
Route::prefix('basket')->middleware(['role:client'])->group(function () {
    Route::get('/', [BasketController::class, 'showBasket']);
    Route::get('/add/{productId}', [BasketController::class, 'addProduct']);
    Route::get('/addcount/{productId}', [BasketController::class, 'addCountProduct']);
    Route::get('/remove/{productId}', [BasketController::class, 'removeProduct']);
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
    Route::get('/orders', 'ProfileController@changeInfo')->name('change.profile');
});

/**
 * Order - оформление заказа
 */
Route::namespace('Shop')->middleware(['auth'])->group(function () {
    Route::get('/save-order', [OrderController::class, 'orderConfirm'])->name('save.order');
    Route::get('/finish', 'FinishController@index')->name('finish');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role:client');
