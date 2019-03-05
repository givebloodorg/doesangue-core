<?php

 namespace GiveBlood\Modules\Bank\Database\Seeders;

use Illuminate\Database\Seeder;
use  GiveBlood\Modules\Bank\Bank;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bank::class, 10)->create();

        $this->command->info('Blood Banks created sucessfully!');
    }
}
