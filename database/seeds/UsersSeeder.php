<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->truncate();
        DB::table('users')->insert(array(
          array('name' => 'José Cage', 'email' => 'josecage@doesangueapp.dev'),
        ));
    }
}
