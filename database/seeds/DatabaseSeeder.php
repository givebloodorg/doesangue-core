<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(BloodTypeSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(BanksSeeder::class);
        $this->call(CampaignsSeeder::class);
    }
}
