<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/**
 * @var \Illuminate\Database\Eloquent\Factory
 */

$factory->define(DoeSangue\Models\Donor::class, function (Faker $faker) {
  return [
    'user_id' => $faker->randomDigit,
    'blood_type_id' => $faker->randomDigit,
  ];
});
