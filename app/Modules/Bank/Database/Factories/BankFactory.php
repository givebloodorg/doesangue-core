<?php

namespace GiveBlood\Modules\Bank\Database\Factories;

use GiveBlood\Modules\Bank\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
{
    /**
     * @var class-string<Bank>
     */
    protected $model = Bank::class;

    /**
     * @return array<string, string>
     */
    public function definition(): array
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
