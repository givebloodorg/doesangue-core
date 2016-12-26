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


// Socialite Routes.
/*
Route::get('login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('login/{provider}', 'Auth\AuthController@handleProviderCallback');

Route::get('logout', 'Auth\AuthController@logout');
*/
//Auth::routes();

Auth::routes();

Route::get('/', 'HomeController@index');
