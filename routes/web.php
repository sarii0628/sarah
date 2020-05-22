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
    return view('welcome');
});

Route::get('top', 'TopController@index');

Route::get('shop-info', 'InfoController@index');

Route::get('products', 'ProductsController@index');
Route::get('products/category/{id}', 'ProductsController@show_category');
Route::get('products/category/{category_id}/{product_id}', 'ProductsController@show_product');

Route::middleware('auth:user')->group(function () {

    Route::post('cart/add', 'CartController@addToCart');
    Route::get('cart/index', 'CartController@index');
    Route::post('cart/remove', 'CartController@remove');
    Route::post('cart/plus', 'CartController@plus');
    Route::post('cart/minus', 'CartController@minus');
    Route::post('cart/confirm', 'CartController@confirm');
});


Route::get('cart/confirm', function() {
    return view('cart.confirm');
});

Route::get('contact', 'ContactController@index')->name('contact.index');
Route::post('contact/confirm', 'ContactController@confirm')->name('contact.confirm');
Route::post('contact/thanks', 'ContactController@send')->name('contact.send');


//Admin after logged-in
Route::middleware('auth:admin')->group(function () {

    Route::get('category', 'CategoryController@index');
    Route::get('category/add', 'CategoryController@add');
    Route::post('category/add', 'CategoryController@create');
    Route::get('category/edit', 'CategoryController@edit');
    Route::post('category/edit', 'CategoryController@update');
    Route::get('category/del', 'CategoryController@delete');
    Route::post('category/del', 'CategoryController@remove');

    Route::get('color', 'ColorController@index');
    Route::get('color/add', 'ColorController@add');
    Route::post('color/add', 'ColorController@create');
    Route::get('color/edit', 'ColorController@edit');
    Route::post('color/edit', 'ColorController@update');
    Route::get('color/del', 'ColorController@delete');
    Route::post('color/del', 'ColorController@remove');

    Route::get('product', 'ProductController@index');
    Route::get('product/add', 'ProductController@add');
    Route::post('product/add', 'ProductController@create');
    Route::get('product/edit', 'ProductController@edit');
    Route::post('product/edit', 'ProductController@update');
    Route::get('product/del', 'ProductController@delete');
    Route::post('product/del', 'ProductController@remove');

    Route::get('stock', 'StockController@index');
    Route::get('stock/add', 'StockController@add');
    Route::post('stock/add', 'StockController@create');
    Route::get('stock/edit', 'StockController@edit');
    Route::post('stock/edit', 'StockController@update');
    Route::get('stock/del', 'StockController@delete');
    Route::post('stock/del', 'StockController@remove');

});


//user
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    Auth::routes([
        'register' => true,
        'reset' => false,
        'verify' => false
    ]);

    Route::middleware('auth:user')->group(function () {

        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    Auth::routes([
        'register' => true,
        'reset' => false,
        'verify' => false
    ]);

    Route::middleware('auth:admin')->group(function () {

        Route::resource('home', 'HomeController', ['only' => 'index']);

    });
});

Route::get('sample/mailable/preview', function () {
    return  new App\Mail\SampleNotification();
});
