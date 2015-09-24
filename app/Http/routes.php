<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'index', 'uses' => 'PagesController@index'
]);

Route::get('home', 'HomeController@index');

Route::get('login', 'PagesController@login');
Route::post('login', 'PagesController@authuser');
Route::post('menu', 'PagesController@postMenu');
Route::get('menu', 'PagesController@menu');
Route::get('cart', 'PagesController@cart');
Route::put('updatecart', 'PagesController@updatecart');
Route::put('updatelocation', 'PagesController@updatelocation');

Route::get('placeorder', 'PagesController@cart');
Route::post('placeorder', ['middleware' => 'auth', 'uses' => 'PagesController@placeorder' ]);

// Admin pages
Route::get('admin/dishes', 'AdminController@dishes');
Route::get('admin/dish', 'AdminController@addDish');
Route::get('admin/dish/{id}', 'AdminController@editDish');
Route::post('admin/storedish', 'AdminController@store');

Route::get('admin/orders/today', 'AdminController@ordersToday');
Route::get('admin/orders/all', 'AdminController@ordersAll');
Route::get('admin/orders/delivered', 'AdminController@ordersDelivered');
Route::get('admin/orders/{id}', 'AdminController@showOrder');

Route::get('admin/locations', 'AdminController@locations');
Route::get('admin/location', 'AdminController@addLocation');
Route::get('admin/location/{id}', 'AdminController@editLocation');
Route::post('admin/storelocation', 'AdminController@storeLocation');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
