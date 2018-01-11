<?php

use Faker\Generator as Faker;

use DoeSangue\Models\BloodType;

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
      'id' => $faker->uuid,
      'first_name' => $faker->firstName,
      'last_name' => $faker->lastName,
      'email' => $faker->unique()->companyEmail,
      'username' => $faker->userName(20),
      'phone' => $faker->tollFreePhoneNumber,
      'bio' => $faker->text($maxNbChars = 100),
      'birthdate' => $faker->date,
      'blood_type_id' => factory(BloodType::class)->create(),
      'password' => $password ?: $password = bcrypt('secret'),
      'remember_token' => str_random(10),
    ];
});
