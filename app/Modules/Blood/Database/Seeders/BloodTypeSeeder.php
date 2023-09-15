<?php

namespace GiveBlood\Modules\Blood\Database\Seeders;

use GiveBlood\Modules\Blood\BloodType;
use GiveBlood\Modules\Blood\Database\Factories\BloodTypeFactory;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // DB::table('blood_types')->delete();
        // DB::table('blood_types')->insert(
        //     [
        //     array('description' => 'O negative', 'code' => 'O-', 'id' => '16d4b85d-8ab4-438e-94aa-400d266fbfa9'),
        //     array('description' => 'O Positive', 'code' => 'O+', 'id' => '20a4c67d-8de9-668e-83aa-868a244cdfe3'),
        //     ]
        // );
        /*
        factory(BloodType::class, 2)->create();
        */

       // BloodType::factory(2)->create();]
        BloodTypeFactory::new()->count(2)->create();

        $this->command->info('BloodTypes created sucessfully!');
    }
}
