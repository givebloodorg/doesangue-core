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

$factory->define(DoeSangue\Models\User::class, function (Faker $faker) {
  static $password;

    return [
      'first_name' => $faker->firstName,
      'last_name' => $faker->lastName,
      'email' => $faker->unique()->companyEmail,
      'username' => $faker->userName,
      'phone' => $faker->tollFreePhoneNumber,
      'bio' => $faker->text($maxNbChars = 100),
      'birthdate' => $faker->date,
      'password' => $password ?: $password = bcrypt('secret'),
      'remember_token' => str_random(10),
    ];
});
