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

        DB::table('blood_types')->delete();
        DB::table('blood_types')->insert(
            [
            array('description' => 'O negative', 'code' => 'O-', 'id' => '16d4b85d-8ab4-438e-94aa-400d266fbfa9'),
            array('description' => 'O Positive', 'code' => 'O+', 'id' => '20a4c67d-8de9-668e-83aa-868a244cdfe3'),
            ]
        );

        $this->command->info('BloodTypes created sucessfully!');
    }
}
