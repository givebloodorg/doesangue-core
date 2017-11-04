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

$factory->define(DoeSangue\Models\BloodType::class, function (Faker $faker) {
  return [
    'description' => $faker->title,
    'code' => $faker->randomDigit,
  ];
});
