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
        $this->command->info('Usuários criados com sucesso!');

        DB::table('users')->delete();
        //        DB::table('users')->truncate();
        DB::table('users')->insert(
            [
            ['id' => '1', 'name' => 'José Cage', 'email' => 'josecage@doesangueapp.dev', 'username' => 'josecage', 'biografia' => 'Analista de Sistemas', 'password' => bcrypt('1234567')],
            ['id' => '2', 'name' => 'Jó Cage', 'email' => 'jocage@doesangueapp.dev', 'username' => 'jocage','biografia' => 'Desenvolvedor web', 'password' =>bcrypt('1234567')],
            ['id' => '3', 'name' => 'User Demo', 'email' => 'demo@doesangueapp.dev', 'username' => 'userdemo', 'biografia' => 'Test Driver', 'password' =>bcrypt('1234567')],
            ['id' => '4', 'name' => 'User Demo 2', 'email' => 'demo2@doesangueapp.dev', 'username' => 'userdemo2', 'biografia' => 'Test Driver', 'password' => bcrypt('1234567')],
            ['id' => '5', 'name' => 'User Demo 3', 'email' => 'demo3@doesangueapp.dev', 'username' => 'userdemo3','biografia' => 'Test Driver', 'password' => bcrypt('1234567')],
            ]
        );
    }
}
