<?php

namespace GiveBlood\Modules\Users\Database\Factories;

use Illuminate\Support\Str;
use GiveBlood\Modules\Blood\BloodType;
use GiveBlood\Modules\Blood\Database\Factories\BloodTypeFactory;
use GiveBlood\Modules\Users\User;
use GiveBlood\Modules\Users\Country;
use GiveBlood\Modules\Users\Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserFactory extends Factory
{
    /**
     * @var class-string<User>
     */
    protected $model = User::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
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

        'country_id' =>  CountryFactory::new()->create()->id,
        'blood_type_id' =>  BloodTypeFactory::new()->create()->id,
            /*
        'country_id' => factory(Country::class)->make()->id,
        'blood_type_id' => factory(BloodType::class)->make()->id,
        /*

          'country_id' => Country::factory()->create()->id,
        'blood_type_id' => BloodType::factory()->create()->id,*/
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => Str::random(10),
        ];
    }
}
