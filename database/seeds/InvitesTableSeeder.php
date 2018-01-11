<?php

use Illuminate\Database\Seeder;

class InvitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('invites')->delete();

        $this->command->info('Invites created sucessfully!');
    }
}
