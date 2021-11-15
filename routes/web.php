<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ShopsAndCafesController;
use App\Http\Controllers\Front\OtherCategoriesController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\RecipesController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Basket\BasketController;
use App\Http\Controllers\Basket\FinishController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\OrderController as ManagerOrder;
use App\Http\Controllers\Auth\GenerateAuthCode;

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

//Страницы сайта
Route::get('/', [PageController::class, 'showPage'],
    MetaTag::setTags([
        'title' => config('meta-tags.default.title'),
        'description' => config('meta-tags.default.desсription'),
    ])
);
Route::get('/our-production', [PageController::class, 'showPage']);

// Каталог и карточки товара раздела кафе и магазины
Route::get('/shops-and-cafes', [ShopsAndCafesController::class, 'showPageCatalog']);
Route::get('/shops-and-cafes/{parent}/{category}', [ShopsAndCafesController::class, 'showProductInCategory']);
Route::get('/shops-and-cafes/{parent}/{category}/{product}', [ShopsAndCafesController::class, 'showCardProduct']);

// Каталог и карточки товара раздела кейтеринг
Route::get('/catering', [OtherCategoriesController::class, 'showPageCategory']);
Route::get('/catering/{product}', [OtherCategoriesController::class, 'showPageProduct']);

// Каталог и карточки товара раздела обеды в офис
Route::get('/dinner', [OtherCategoriesController::class, 'showPageCategory']);
Route::get('/dinner/{product}', [OtherCategoriesController::class, 'showPageProduct']);

//Блог
Route::get('/blog', [BlogController::class, 'showPageList']);
Route::get('/blog/{slug}', [BlogController::class, 'showPageText']);

//Рецепты
Route::get('/recipes', [RecipesController::class, 'getCategoryRecipes']);
Route::get('/recipes/{category_slug}', [RecipesController::class, 'getListRecipes']);
Route::get('/recipes/{category_slug}/{recipe_slug}', [RecipesController::class, 'getRecipe']);

//Отправка отзыва
Route::post('/send/review', [ReviewController::class, 'sendReview']);
//Публикация отзыва через письмо
Route::get('/review/on/{id}/{code}', [ReviewController::class, 'includeReview']);


//Корзина
Route::prefix('basket')->group(function () {
    Route::get('/', [BasketController::class, 'showBasket']);
    Route::get('/registration', [BasketController::class, 'registration'])->name('basket.registration');

    Route::get('/finish', [FinishController::class, 'showFinishPage'])->name('basket.finish')/*->middleware(['role:client'])*/;
    Route::post('/add', [BasketController::class, 'addProduct']);
    Route::post('/addcount', [BasketController::class, 'addCountProduct']);
    Route::post('/remove', [BasketController::class, 'removeOneProduct']);
    Route::post('/removeAll', [BasketController::class, 'removeProduct']);
});

/**
 * Shop - оформление заказа
 */
/*Route::namespace('Shop')->middleware(['auth'])->group(function () {
    Route::get('/save-order', [OrderController::class, 'orderConfirm'])->name('save.order');
    Route::get('/finish', 'FinishController@index')->name('finish');
});*/

/**
 * Личный кабинет клиента
 */
Route::prefix('client')/*->middleware(['role:client'])*/
->group(function () {
    Route::get('/profile', [ProfileController::class, 'getProfile'])->name('client.profile');
    Route::get('/change-profile', [ProfileController::class, 'changeInfo'])->name('change.profile');
});


/**
 * Личный кабинет менеджера
 */
Route::prefix('manager')/*->middleware(['role:client'])*/
->group(function () {
    Route::get('/', [ManagerController::class, 'showMainPage'])->name('profile');
    Route::get('/orders', [ManagerOrder::class, 'showOrderPage'])->name('manager.orders');

});

/**
 * Аутификация
 */
Route::post('/generate-code/login', [GenerateAuthCode::class, 'generateCodeRegister'])->middleware(['throttle:generate_code']);


/**
 * Восстановление пароля
 */
//Route::get('/forgot', [\App\Actions\Fortify\ForgotPassword::class, 'showPage']);
//Route::post('/forgot', [\App\Actions\Fortify\ForgotPassword::class, 'sendCode']);
//Route::post('/forgot/update', [\App\Actions\Fortify\ForgotPassword::class, 'checkCode']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role:client');
