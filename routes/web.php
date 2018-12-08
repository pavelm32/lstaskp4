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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('/products', 'Catalog\ProductsController');

    Route::get('/products/{product}/delete', 'Catalog\ProductsController@delete')->name('products.delete');

    Route::resource('/categories', 'Catalog\CategoriesController');

    Route::get('/categories/{category}/delete', 'Catalog\CategoriesController@delete')->name('categories.delete');
});
