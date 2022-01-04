<?php

namespace GiveBlood\Modules\Users\Database\Factories;

use GiveBlood\Modules\Users\Country;
use GiveBlood\Support\Database\ModelFactory;

class CountryFactory extends ModelFactory
{
    /**
     * @var class-string<Country>
     */
    protected $model = Country::class;

    /**
     * @return array<string, string>
     */
    protected function fields(): array
    {
        return [
        'id' => $this->faker->uuid,
        'country_name' => $this->faker->country
        ];
    }
}
