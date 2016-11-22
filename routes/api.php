<?php


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

Route::get(
    '/', function () {
        return response()->json();
    }
);
 // Grupo de rotas da API.
Route::group(
    ['middleware' => 'auth:api', 'namespace' => 'Api'], function () {
        // Usuários
        Route::get('doadores', 'DoadoresController@index');
    }
);
