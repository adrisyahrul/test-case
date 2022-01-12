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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // route query
    Route::get('/home', 'App\Http\Controllers\QueryController@index');
    Route::get('/dua', 'App\Http\Controllers\QueryController@dua');
    Route::get('/tiga', 'App\Http\Controllers\QueryController@tiga');

    // route for data costumer
    Route::get('/data/customer', 'App\Http\Controllers\CustomerController@index');
    Route::post('/data/customer/find', 'App\Http\Controllers\CustomerController@find')->name('customer.find');
    Route::post('/data/customer/add', 'App\Http\Controllers\CustomerController@store');
    Route::put('/data/customer/edit', 'App\Http\Controllers\CustomerController@edit');
    Route::post('/data/customer/delete', 'App\Http\Controllers\CustomerController@delete')->name('customer.delete');

    // route for data items
    Route::get('/data/item', 'App\Http\Controllers\ItemController@index');
    Route::post('/data/item/find', 'App\Http\Controllers\ItemController@find')->name('item.find');
    Route::post('/data/item/add', 'App\Http\Controllers\ItemController@store');
    Route::put('/data/item/edit', 'App\Http\Controllers\ItemController@edit');
    Route::post('/data/item/delete', 'App\Http\Controllers\ItemController@delete')->name('item.delete');
    
    // route transaction order
    Route::get('/transaction/order', 'App\Http\Controllers\OrderController@index');
    Route::post('/transaction/order/find', 'App\Http\Controllers\OrderController@find')->name('order.find');
    Route::post('/transaction/order/add', 'App\Http\Controllers\OrderController@store');
    Route::put('/transaction/order/edit', 'App\Http\Controllers\OrderController@edit');
    Route::post('/transaction/order/delete', 'App\Http\Controllers\OrderController@delete')->name('order.delete');

    Route::get('/transaction/order/create', 'App\Http\Controllers\OrderController@create');
    Route::get('/transaction/order/sunting/{id}', 'App\Http\Controllers\OrderController@sunting');
    Route::put('/transaction/order/ubah/{id}', 'App\Http\Controllers\OrderController@ubah');
    Route::get('/transaction/order/hapus/{id}', 'App\Http\Controllers\OrderController@hapus');

    // route transaction order item
    Route::get('/transaction/orderitem', 'App\Http\Controllers\OrderItemController@index');
    Route::post('/transaction/orderitem/find', 'App\Http\Controllers\OrderItemController@find')->name('orderitem.find');
    Route::post('/transaction/orderitem/add', 'App\Http\Controllers\OrderItemController@store');
    Route::put('/transaction/orderitem/edit', 'App\Http\Controllers\OrderItemController@edit');
    Route::post('/transaction/orderitem/delete', 'App\Http\Controllers\OrderItemController@delete')->name('orderitem.delete');
});


