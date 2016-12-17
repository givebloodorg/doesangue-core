<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->command->info('Usuários criados com sucesso!');

        DB::table('users')->delete();
        //  DB::table('users')->truncate();
        DB::table('users')->insert(
            [
            ['name' => 'José Cage', 'email' => 'josecage@doesangueapp.dev', 'username' => 'josecage', 'password' => bcrypt('1234567'), 'id' => '1'],
            ['name' => 'Jó Cage', 'email' => 'jocage@doesangueapp.dev', 'username' => 'jocage', 'password' => bcrypt('1234567'), 'id' => '2'],
            ['name' => 'User Demo', 'email' => 'demo@doesangueapp.dev', 'username' => 'userdemo', 'password' => bcrypt('1234567'), 'id' => '3'],
            ['name' => 'User Demo 2', 'email' => 'demo2@doesangueapp.dev', 'username' => 'userdemo2', 'password' => bcrypt('1234567'), 'id' => '4'],
            ]
        );
    }
}
