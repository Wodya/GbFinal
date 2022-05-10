<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/search_step1/{search}', [App\Http\Controllers\SearchController::class, 'searchStep1'])->middleware(['auth'])->name('searchStep1');
Route::get('/search_step2/{productId}', [App\Http\Controllers\SearchController::class, 'searchStep2'])->middleware(['auth'])->name('searchStep2');
Route::get('/search_step2/changeQuantity/{offerId}/{quantity}', [App\Http\Controllers\SearchController::class, 'changeQuantity'])->middleware(['auth'])->name('step2ChangeQuantity');
Route::get('/basket', [App\Http\Controllers\BasketController::class, 'basket'])->middleware(['auth'])->name('basket');
Route::get('/basket/changeQuantity/{offerId}/{quantity}', [App\Http\Controllers\BasketController::class, 'changeQuantity'])->middleware(['auth'])->name('basketChangeQuantity');
Route::get('/basket/deletePosition/{offerId}', [App\Http\Controllers\BasketController::class, 'deletePosition'])->middleware(['auth'])->name('basketDeletePosition');
Route::get('/basket/makeOrder/{orderNumber}', [App\Http\Controllers\BasketController::class, 'makeOrder'])->middleware(['auth'])->name('makeOrder');
Route::get('/order/myOrders', [App\Http\Controllers\OrderController::class, 'myOrders'])->middleware(['auth'])->name('myOrders');
Route::get('/order/myAllOrders/{dateFrom?}/{dateTo?}', [App\Http\Controllers\OrderController::class, 'myAllOrders'])->middleware(['auth'])->name('myAllOrders');
Route::get('/order/orders', [App\Http\Controllers\OrderController::class, 'orders'])->middleware(['auth'])->name('orders');
Route::get('/order/allOrders/{dateFrom?}/{dateTo?}', [App\Http\Controllers\OrderController::class, 'allOrders'])->middleware(['auth'])->name('allOrders');
Route::get('/order/changeOrderState/{orderSpcId}/{quantity}/{oldStateId}/{newStateId}', [App\Http\Controllers\OrderController::class, 'changeOrderState'])->
    middleware(['auth'])->name('changeOrderState');

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/register1', function () {
    return view('auth.register1');
});
Route::get('/register2', function () {
    return view('auth.register2');
});

Route::get('/', function () {
    return view('index');
})->middleware(['auth'])->name('home');;

//Route::get('/dashboard', function () {
//    return view('dashboard');
//});
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::get('/main', function () {
    return view('main');
})->middleware(['auth'])->name('main');

require __DIR__.'/auth.php';
