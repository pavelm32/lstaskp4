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

Route::group(['prefix' => 'catalog'], function () {
    Route::get('/', 'Catalog\CatalogController@index')->name('catalog.index');
    Route::get('/category/{category}', 'Catalog\CatalogController@category')->name('catalog.category');
    Route::get('/product/{product}', 'Catalog\CatalogController@product')->name('catalog.product');
    Route::post('/checkout/{product}', 'Catalog\CatalogController@checkout')->name('catalog.checkout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    Route::get('/', 'Catalog\AdminController@index')->name('admin.index');

    Route::get('/edit', 'Catalog\AdminController@edit')->name('admin.edit');
    Route::put('/update', 'Catalog\AdminController@update')->name('admin.update');

    Route::get('/orders', 'Catalog\OrderController@index')->name('orders.index');

    Route::resource('/products', 'Catalog\ProductsController');

    Route::get('/products/{product}/delete', 'Catalog\ProductsController@delete')->name('products.delete');

    Route::resource('/categories', 'Catalog\CategoriesController');

    Route::get('/categories/{category}/delete', 'Catalog\CategoriesController@delete')->name('categories.delete');
});
