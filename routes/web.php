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

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('/','ProductController@index')->name('product.index');

Route::group(['middleware' => ['auth']], function () {
Route::get('/create','ProductController@create');
Route::post('/books','ProductController@store');
Route::get('/product/{product}','ProductController@show')->name('product.show');


Route::post('/cart/create','CartController@store');
Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/cart/checkout','CartController@checkout')->name('cart.checkout');
Route::delete('/cart/{cart}','CartController@destroy')->name('cart.destroy');
Route::get('/carts/success','CartController@success')->name('cart.success');
Route::get('/users/{user}','UserController@show')->name('users.show');
Route::get('/user/{favorites}','UserController@favorites')->name('users.favorites');
Route::get('/order{order}','OrderController@index')->name('order.index');
Route::get('/detail{detail}','OrderDetailController@show')->name('order.details');

Route::group(['prefix' => 'products/{id}'], function () {
        Route::post('favorite', 'FavoriteController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoriteController@destroy')->name('favorites.unfavorite');
    });
});
