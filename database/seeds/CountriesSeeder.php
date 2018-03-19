<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();

        DB::table('countries')->insert([
            ['country_name' => 'Angola', 'country_code' => 'AO'],
            ['country_name' => 'Moçambique', 'country_code' => 'Moz']
        ]);
    }
}
