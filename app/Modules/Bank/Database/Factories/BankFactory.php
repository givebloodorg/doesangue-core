<?php

namespace GiveBlood\Modules\Bank\Database\Factories;

use GiveBlood\Modules\Bank\Bank;
use GiveBlood\Support\Database\ModelFactory;

class BankFactory extends ModelFactory
{
    /**
     * @var class-string<Bank>
     */
    protected $model = Bank::class;

    /**
     * @return array<string, string>
     */
    protected function fields(): array
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
