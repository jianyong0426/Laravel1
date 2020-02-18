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

Route::get('/products', 'ProductsController@index')->name('products');

Route::get('/products/{id}', 'ProductsController@show')->name('products.show');

Route::get('/error', 'ErrorController@index')->name('errorpage');

Route::get('/aboutus', 'AboutUsController@index')->name('aboutus');

Route::get('/shoppingcart', 'ShoppingCartController@show')->name('showcart');

Route::post('/addtocart/{id}', 'ShoppingCartController@addToCart')->name('addcart');

Route::get('/shoppingcart/delete/{id}', 'ShoppingCartController@delete')->name('cartitem.delete');

Route::post('/shoppingcart/update', 'ShoppingCartController@update')->name('cartupdate');

Route::post('/search', 'ProductsController@search')->name('search');

Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin'], function () {

    Route::get('/orders', 'AdminOrdersController@index')->name('admin.orders');

    Route::get('/order/{id}/show', 'AdminOrdersController@show')->name('admin.order.show');

    Route::post('/order/{id}/save', 'AdminOrdersController@save')->name('admin.order.save');

    Route::get('/products', 'AdminProductsController@index')->name('admin.products');

    Route::get('/products/edit/{id}', 'AdminProductsController@edit')->name('admin.products.edit');

    Route::post('/products/save/{id}', 'AdminProductsController@save')->name('admin.products.save');

    Route::get('/products/delete/{id}', 'AdminProductsController@delete')->name('admin.products.delete');

});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/checkout', 'ShoppingCartController@checkout')->name('checkout');

    Route::get('/profile', 'UserController@showProfile')->name('profile');

    Route::get('/profile/edit', 'UserController@editProfile')->name('profile.edit');

    Route::post('/profile/save', 'UserController@saveProfile')->name('profile.save');

    Route::post('/payment', 'OrdersController@payment')->name('payment');

    Route::get('/order', 'OrdersController@show')->name('order');
});
