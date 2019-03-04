<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(
    GiveBlood\Modules\Bank\Bank::class, function (Faker $faker) {
        return [
        'id' => $faker->uuid,
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'url' => $faker->domainName,
        'phone' => $faker->phoneNumber,
        'location' => $faker->address
        ];
    }
);
