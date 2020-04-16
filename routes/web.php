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

Route::get('home', 'HomeController@index');

Route::get('shop-info', 'InfoController@index');

Route::get('products', 'ProductsController@index');

Route::get('contact', 'ContactController@index');


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

Route::get('chopunix', 'HelloController@index');

Route::get('/top', 'PageController@top');
Route::get('/about', 'PageController@about');
Route::get('/ec', 'PageController@ec');
Route::get('/test', 'PageController@test');