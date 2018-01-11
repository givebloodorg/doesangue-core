<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(DoeSangue\Models\Bank::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'url' => $faker->domainName,
        'phone' => $faker->phoneNumber,
        'location' => $faker->address
    ];
});
