<?php

use Illuminate\Database\Seeder;

class DonorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->command->info('Doadores criados com sucesso!');

        DB::table('donors')->truncate();
        DB::table('donors')->insert(
            [
            ['id' => '1', 'user_id' => '1', 'blood_type_id' => '1'],
            ['id' => '2', 'user_id' => '2', 'blood_type_id' => '1'],
            ['id' => '3', 'user_id' => '3', 'blood_type_id' => '2'],
            ]
        );
    }
}
