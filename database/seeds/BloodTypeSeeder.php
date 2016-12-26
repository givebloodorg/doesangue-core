<?php

use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Grupos sanguineos criados');

        DB::table('blood_types')->delete();
        DB::table('blood_types')->insert(
            [
            array('description' => 'A negativo', 'code' => 'A-', 'id' => '1'),
            array('description' => 'A Positivo', 'code' => 'A+', 'id' => '2'),
            array('description' => 'B Negativo', 'code' => 'B-', 'id' => '3'),
            array('description' => 'B Positivo', 'code' => 'B+', 'id' => '4'),
            ]
        );
    }
}
