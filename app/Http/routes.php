<?php

/*
 * DoeSangue.me
 *   Projeto Filantrópico para pesquisa e conexão de doadores voluntários.
 */

  // Lista de Usuários
//  Route::get('users', 'UserController@index');
// Doadores
// Rotas da API.
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

// Lista de Usuários
$api->version(
    'v1', function ($api) {
        $api->get('usuarios', 'DoeSangue\Http\Controllers\UserController@index');
    }
);
// Listar dados de 1 usuário
$api->version(
    'v1', function ($api) {
        $api->get('usuarios/{id}', 'DoeSangue\Http\Controllers\UserController@show');
    }
);

Route::get(
    '/', function () {
        return view('welcome');
    }
);

// Route::auth();

Route::get('/home', 'HomeController@index');
