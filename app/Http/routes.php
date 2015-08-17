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

Route::get('placeorder', ['middleware' => 'auth', 'uses' => 'PagesController@placeorder' ]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
