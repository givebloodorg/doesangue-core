<?php

/*
 * DoeSangue.me
 *   Projeto Filantrópico para pesquisa e conexão de doadores voluntários.
 */



$factory->define(DoeSangue\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->safeEmail,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
