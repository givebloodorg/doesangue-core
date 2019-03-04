<?php

namespace GiveBlood\Modules\Bank;

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
class BankFactory extends ModelFactory
{
    protected $model = Bank::class;

    protected function fields()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'url' => $this->faker->domainName,
            'phone' => $this->faker->phoneNumber,
            'location' => $this->faker->address
        ];
    }
}
