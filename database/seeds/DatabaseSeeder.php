<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(BloodTypeSeeder::class);
        $this->call(CampaignsSeeder::class);
        $this->call(BanksSeeder::class);
    }
}
