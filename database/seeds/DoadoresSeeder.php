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
        //        DB::table('doadores')->truncate();
        DB::table('doadores')->insert(
            array(
            array('id' => '1', 'user_id' => '1'),
            array('id' => '2', 'user_id' => '2'),
            array('id' => '3', 'user_id' => '3'),
            array('id' => '4', 'user_id' => '4'),
            array('id' => '5', 'user_id' => '5'),
            array('id' => '6', 'user_id' => '5'),
            )
        );

    }
}
