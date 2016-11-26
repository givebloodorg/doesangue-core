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

//Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get(
    '/', ['as' => 'home', 'uses' => function () {
        return view('welcome');
    }]
);

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {

    Route::get('/', ['as' => 'users.profile', 'uses' => 'UsersController@profile']);

});

// Socialite Routes.
Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');

Auth::routes();
