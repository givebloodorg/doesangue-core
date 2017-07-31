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
        $this->command->info('BloodTypes created sucessfully!');

        DB::table('blood_types')->delete();
        DB::table('blood_types')->insert(
            [
            array('description' => 'A negative', 'code' => 'A-', 'id' => '1'),
            array('description' => 'A Positive', 'code' => 'A+', 'id' => '2'),
            array('description' => 'B Negative', 'code' => 'B-', 'id' => '3'),
            array('description' => 'B Positive', 'code' => 'B+', 'id' => '4'),
            ]
        );
    }
}
