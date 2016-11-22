<?php

use Illuminate\Database\Seeder;

class DoadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Doadores criados com sucesso!');

        DB::table('doadores')->delete();
        DB::table('doadores')->truncate();
        DB::table('doadores')->insert(
            [
            ['id' => '1', 'user_id' => '1', 'bio' => 'Test Driver'],
            ['id' => '2', 'user_id' => '2' ,'bio' => 'Test Driver'],
            ['id' => '3', 'user_id' => '3', 'bio' => 'Test Driver'],
            ['id' => '4', 'user_id' => '4', 'bio' => 'Test Driver'],
            ['id' => '5', 'user_id' => '5', 'bio' => 'Test Driver'],
            ['id' => '6', 'user_id' => '5', 'bio' => 'Test Driver'],
            ]
        );
    }
}
