<?php

namespace GiveBlood\Modules\Users;

use GiveBlood\Modules\Blood\BloodType;
use GiveBlood\Support\Database\ModelFactory;

/*
|--------------------------------------------------------------------------
| User Model Factory
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
class UserFactory extends ModelFactory
{
    protected $model = User::class;

    protected function fields(){
        static $password;

        return [
        'id' => $this->faker->uuid,
        'first_name' => $this->faker->firstName,
        'last_name' => $this->faker->lastName,
        'email' => $this->faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'username' => $this->faker->userName(20),
        'phone' => $this->faker->tollFreePhoneNumber,
        'bio' => $this->faker->text($maxNbChars = 100),
        'birthdate' => $this->faker->date,
        'blood_type_id' => factory(BloodType::class)->create(),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => \Str::random(10),
        ];
    }
}
