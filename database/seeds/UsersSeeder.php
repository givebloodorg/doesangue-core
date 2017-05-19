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
            ['first_name' => 'José', 'last_name' => 'Cage', 'email' => 'josejanuario7@gmail.com', 'username' => 'josecage', 'password' => bcrypt('123456789'), 'id' => '1'],
            ['first_name' => 'Jó', 'last_name' => 'Cage', 'email' => 'jocage@doesangue.me', 'username' => 'jocage', 'password' => bcrypt('123456789'), 'id' => '2'],
            ['first_name' => 'Admin', 'last_name' => 'User', 'email' => 'admin@doesangue.me', 'username' => 'userdemo', 'password' => bcrypt('123456789'), 'id' => '3']
            ]
        );
    }
}
