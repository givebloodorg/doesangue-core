<?php

namespace GiveBlood\Modules\Campaign\Database\Seeders;

use Illuminate\Database\Seeder;
use  GiveBlood\Modules\Users\User;
use  GiveBlood\Modules\Campaign\Campaign;
use DB;

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
