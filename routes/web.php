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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'App\Http\Controllers\QuerysatuController@index');

// route for data costumer
Route::get('/data/customer', 'App\Http\Controllers\CustomerController@index');
Route::post('/data/customer/add', 'App\Http\Controllers\CustomerController@store');
Route::get('/data/customer/update/{id}', 'App\Http\Controllers\CustomerController@update');
Route::put('/data/customer/edit/{id}', 'App\Http\Controllers\CustomerController@edit');
Route::get('/data/customer/delete/{id}', 'App\Http\Controllers\CustomerController@delete');

// route for data items
Route::get('/data/item', 'App\Http\Controllers\ItemController@index');
Route::post('/data/item/add', 'App\Http\Controllers\ItemController@store');
Route::get('/data/item/update/{id}', 'App\Http\Controllers\ItemController@update');
Route::put('/data/item/edit/{id}', 'App\Http\Controllers\ItemController@edit');
Route::get('/data/item/delete/{id}', 'App\Http\Controllers\ItemController@delete');

// route one to many
Route::get('/transaction/order', 'App\Http\Controllers\OrderController@index');
Route::get('/transaction/orderitem', 'App\Http\Controllers\OrderItemController@index');
