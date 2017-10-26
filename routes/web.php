<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('emptyCart', 'CartController@emptyCart');
Route::get('checkout', 'CartController@checkout');

Route::resource('shop', 'ProductController', ['only' => ['index', 'show', 'update', 'destroy']]);
Route::resource('cart', 'CartController');
Route::resource('order', 'OrderController', ['only' => ['index', 'show', 'store', 'destroy']]);
// Route::post('order', 'OrderController@store');