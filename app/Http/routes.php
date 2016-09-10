<?php

/*
 * Todos Direitos Reservados.
 *
 * DoeSangue.me
 */


Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
