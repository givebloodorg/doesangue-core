<?php

namespace GiveBlood\Modules\Bank\Database\Seeders;

use Illuminate\Database\Seeder;
use  GiveBlood\Modules\Bank\Bank;
use GiveBlood\Modules\Bank\Database\Factories\BankFactory;

#php artisan db:seed --class=GiveBlood\Modules\Bank\Database\Seeders\BanksSeeder
class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        factory(Bank::class, 10)->create();
        */
       // Bank::factory(10)->create();
    BankFactory::new()->count(2)->create();
        $this->command->info('Blood Banks created sucessfully!');
    }
}
