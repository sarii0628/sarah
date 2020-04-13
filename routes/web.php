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




Route::get('chopunix', 'HelloController@index');

Route::get('/top', 'PageController@top');
Route::get('/about', 'PageController@about');
Route::get('/ec', 'PageController@ec');
Route::get('/test', 'PageController@test');