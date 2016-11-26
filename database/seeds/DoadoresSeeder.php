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

        DB::table('donors')->truncate();
        DB::table('donors')->insert(
            [
            ['id' => '1', 'user_id' => '1', 'blood_type_id' => '1'],
            ['id' => '2', 'user_id' => '2' ,'blood_type_id' => '1'],
            ['id' => '3', 'user_id' => '3', 'blood_type_id' => '1'],
            ['id' => '4', 'user_id' => '4', 'blood_type_id' => '1'],
            ['id' => '5', 'user_id' => '5', 'blood_type_id' => '1'],
            ['id' => '6', 'user_id' => '5', 'blood_type_id' => '1'],
            ]
        );
    }
}
