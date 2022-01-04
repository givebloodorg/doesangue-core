<?php

 namespace GiveBlood\Modules\Bank\Database\Seeders;

use Illuminate\Database\Seeder;
use  GiveBlood\Modules\Bank\Bank;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(Bank::class, 10)->create();

        $this->command->info('Blood Banks created sucessfully!');
    }
}
