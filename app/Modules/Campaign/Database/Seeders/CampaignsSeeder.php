<?php

use Illuminate\Database\Seeder;
use DoeSangue\Models\User;
use DoeSangue\Models\Campaign;

class CampaignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('campaigns')->delete();

        factory(User::class, 20)->create()->each(
            function ($u) {
                    $u->campaigns()->save(factory(Campaign::class)->make());
            }
        );

          $this->command->info('Campaigns created!');
    }
}
