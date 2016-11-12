<?php

/*
 * DoeSangue.me
 *   Projeto Filantrópico para pesquisa e conexão de doadores voluntários.
 */



Route::get(
    '/', function () {
        return view('welcome');
    }
);

Route::auth();

Route::get('/home', 'HomeController@index');

$api = app('Dingo\Api\Routing\Router');

$api->version(
    'v1', function ($api) {
        $api->get('doadores', 'DoeSangue\Http\Controllers\DoadoresController@index');
    }
);
$api->version(
    'v1', function ($api) {
        $api->get('doadores/{id}', 'DoeSangue\Http\Controllers\DoadoresController@show');
    }
);
