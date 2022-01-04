<?php

namespace GiveBlood\Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;

class InvitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('invites')->delete();

        $this->command->info('Invites created sucessfully!');
    }
}
