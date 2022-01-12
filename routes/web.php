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
    
    // route transaction
    Route::get('/transaction/order', 'App\Http\Controllers\OrderController@index');
    Route::post('/transaction/order/add', 'App\Http\Controllers\OrderController@store');
    Route::get('/transaction/order/update/{id}', 'App\Http\Controllers\OrderController@update');
    Route::put('/transaction/order/edit/{id}', 'App\Http\Controllers\OrderController@edit');
    Route::get('/transaction/order/delete/{id}', 'App\Http\Controllers\OrderController@delete');

    Route::get('/transaction/orderitem', 'App\Http\Controllers\OrderItemController@index');
    // Route::post('/transaction/orderitem/add', 'App\Http\Controllers\OrderItemController@store');
    // Route::get('/transaction/orderitem/update/{id}', 'App\Http\Controllers\OrderItemController@update');
    // Route::put('/transaction/orderitem/edit/{id}', 'App\Http\Controllers\OrderItemController@edit');
    // Route::get('/transaction/orderitem/delete/{id}', 'App\Http\Controllers\OrderItemController@delete');
});


