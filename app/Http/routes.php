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
Route::get('menu', 'PagesController@menu');
Route::post('cart', 'PagesController@cart');
Route::get('cart', 'PagesController@cart1');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
