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

// User routes
Route::get('/', [
    'as' => 'index', 'uses' => 'PagesController@index'
]);

Route::get('home', 'HomeController@index');

// Static pages
Route::get('/pages/{id}', 'PagesController@pages');

Route::get('/login', 'PagesController@login');
Route::post('/login', 'PagesController@authuser');


Route::get('/login/facebook', 'PagesController@facebook');
Route::get('/login/callback', 'PagesController@fb_callback');

Route::post('/menu', 'PagesController@postMenu');
Route::get('/menu', 'PagesController@menu');
Route::get('/cart', 'PagesController@cart');
Route::get('/support', 'PagesController@support');
Route::post('/support', 'PagesController@support_mail');

Route::put('/updatecart', 'PagesController@updatecart');
Route::put('/updatelocation', 'PagesController@updatelocation');

// Routes that needs the user to be logged in 
Route::get('/checkout', ['middleware' => 'auth', 'uses' => 'PagesController@checkout']);
Route::get('/profile', ['middleware' => 'auth', 'uses' => 'PagesController@profile' ]);
Route::post('/profile', ['middleware' => 'auth', 'uses' => 'PagesController@save_profile' ]);
Route::post('/change_password', ['middleware' => 'auth', 'uses' => 'PagesController@change_password' ]);

Route::get('/placeorder', 'PagesController@cart');
Route::post('/placeorder', ['middleware' => 'auth', 'uses' => 'PagesController@placeorder' ]);

// Admin pages
Route::get('/admin', 'AdminController@dashboard');
Route::post('/admin', 'AdminController@update_rates');
Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@do_login');

Route::get('/admin/dishes', 'AdminController@dishes');
Route::get('/admin/dish', 'AdminController@addDish');
Route::get('/admin/dish/{id}', 'AdminController@editDish');
Route::post('/admin/storedish', 'AdminController@store');

Route::get('/admin/orders/today', 'AdminController@ordersToday');
Route::get('/admin/orders/all', 'AdminController@ordersAll');
Route::get('/admin/orders/delivered', 'AdminController@ordersDelivered');
Route::get('/admin/orders/{id}', 'AdminController@showOrder');

Route::get('/admin/locations', 'AdminController@locations');
Route::get('/admin/location', 'AdminController@addLocation');
Route::get('/admin/location/{id}', 'AdminController@editLocation');
Route::post('/admin/storelocation', 'AdminController@storeLocation');

// Authentication controllers
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
