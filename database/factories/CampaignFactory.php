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

$factory->define(DoeSangue\Models\Campaign::class, function (Faker $faker) {
    return [
      'title' => $faker->text(60),
      'description' => $faker->text(100),
      'expires' => \Carbon\Carbon::now()->endOfYear(),
      'image' => $faker->imageUrl,
      'user_id' => $faker->randomDigit,
    ];
});
