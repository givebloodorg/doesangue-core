<?php

 namespace GiveBlood\Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

use GiveBlood\Modules\Users\Country;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class, 5)->make();

        $this->command->info('Countries created sucessfully!');
    }
}
