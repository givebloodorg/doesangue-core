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

    protected function fields()
    {
        return [
        'id' => $faker->uuid,
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'url' => $faker->domainName,
        'phone' => $faker->phoneNumber,
        'location' => $faker->address
        ];
    }
}
