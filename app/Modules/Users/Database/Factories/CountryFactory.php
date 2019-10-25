<?php

namespace GiveBlood\Modules\Users;

use GiveBlood\Modules\Users\Country;
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
class CountryFactory extends ModelFactory
{
    protected $model = Country::class;

    protected function fields()
    {
        return [
        'id' => $this->faker->uuid,
        'country_name' => $this->faker->country
        ];
    }
}
