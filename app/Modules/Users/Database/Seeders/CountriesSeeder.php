<?php

namespace GiveBlood\Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use GiveBlood\Modules\Users\Database\Factories\CountryFactory;

use GiveBlood\Modules\Users\Country;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // factory(Country::class, 5)->make();

       // Country::factory(5)->create();
       CountryFactory::new()->count(5)->create();

        $this->command->info('Countries created sucessfully!');
    }
}
