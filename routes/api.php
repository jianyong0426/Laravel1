<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::get('me', 'Api\AuthController@me');

});

Route::get('/register','Api\RegisterController@register')->name('register');

Route::get('/products', 'Api\ProductsController@index')->name('products');

Route::get('/products/{id}', 'Api\ProductsController@show')->name('products.show');

Route::get('/shoppingcart', 'Api\ShoppingCartController@show')->name('showcart');

Route::post('/addtocart/{id}', 'Api\ShoppingCartController@addToCart')->name('addcart');

Route::get('/shoppingcart/delete/{id}', 'Api\ShoppingCartController@delete')->name('cartitem.delete');

Route::put('/shoppingcart/update', 'Api\ShoppingCartController@update')->name('cartupdate');//

Route::post('/search', 'Api\ProductsController@search')->name('search');

Route::get('/checkout', 'Api\ShoppingCartController@checkout')->name('checkout');

Route::get('/profile', 'Api\UserController@showProfile')->name('profile');

Route::get('/profile/edit', 'Api\UserController@editProfile')->name('profile.edit');

Route::post('/profile/save', 'Api\UserController@saveProfile')->name('profile.save');//

Route::post('/payment', 'Api\OrdersController@payment')->name('payment');//

Route::get('/order', 'Api\OrdersController@show')->name('order');
