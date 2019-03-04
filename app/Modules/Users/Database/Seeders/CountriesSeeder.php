<?php

namespace GiveBlood\Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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

        DB::table('countries')->insert(
            [
            ['country_name' => 'Angola', 'country_code' => 'AO'],
            ['country_name' => 'Moçambique', 'country_code' => 'Moz']
            ]
        );
    }
}
