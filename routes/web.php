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

Route::get('/data/customer', 'App\Http\Controllers\CustomerController@index');
Route::post('/data/customer/add', 'App\Http\Controllers\CustomerController@store');
Route::get('/data/customer/update/{id}', 'App\Http\Controllers\CustomerController@update');
Route::put('/data/customer/edit/{id}', 'App\Http\Controllers\CustomerController@edit');
Route::get('/data/customer/delete/{id}', 'App\Http\Controllers\CustomerController@delete');
