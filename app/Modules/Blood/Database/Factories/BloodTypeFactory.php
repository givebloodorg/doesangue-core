<?php

namespace GiveBlood\Modules\Blood\Database\Factories;

use GiveBlood\Modules\Blood\BloodType;
use GiveBlood\Support\Database\ModelFactory;

/*
|--------------------------------------------------------------------------
| Blood Model Factory
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
class BloodTypeFactory extends ModelFactory
{
    /**
     * @var class-string<BloodType>
     */
    protected $model = BloodType::class;

    /**
     * @return array<string, mixed>
     */
    protected function fields(): array
    {

        return [
        'id' => $this->faker->uuid,
        'description' => $this->faker->randomElement(['O Positive', 'O Negative', 'A', 'A Negative']),
        'code' => $this->faker->randomElement(['O+', 'O-', 'A', 'A-']),
        ];
    }
}
