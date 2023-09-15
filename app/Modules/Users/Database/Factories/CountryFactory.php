<?php

namespace GiveBlood\Modules\Users\Database\Factories;

use GiveBlood\Modules\Users\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * @var class-string<Country>
     */
    protected $model = Country::class;

    /**
     * @return array<string, string>
     */
    public function definition(): array
    {
        return [
        'country_name' => $this->faker->country
        ];
    }
}
