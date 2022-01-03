<?php

namespace GiveBlood\Modules\Users\Database\Factories;

use Str;
use GiveBlood\Modules\Blood\BloodType;
use GiveBlood\Modules\Users\User;
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
    /**
     * @var class-string<User>
     */
    protected $model = User::class;

    /**
     * @return array<string, mixed>
     */
    protected function fields(): array
    {
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
        'country_id' => factory(Country::class)->make()->id,
        'blood_type_id' => factory(BloodType::class)->make()->id,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => Str::random(10),
        ];
    }
}
