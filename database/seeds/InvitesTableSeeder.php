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
        DB::table('invites')->insert(
            [
            [
              'user_id' => 1, 'invite_code' => Hash::make('joinUS2017')
            ],
            [
              'user_id' => 2, 'invite_code' => Hash::make('joinUSNow')
            ]
            ]
        );
        $this->command->info('Invites created sucessfully!');
    }
}
