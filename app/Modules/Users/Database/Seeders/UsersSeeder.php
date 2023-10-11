<?php

namespace GiveBlood\Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use  GiveBlood\Modules\Users\User;
use  GiveBlood\Modules\Blood\BloodType;
use GiveBlood\Modules\Users\Database\Factories\UserFactory;
use GiveBlood\Modules\Blood\Database\Factories\BloodTypeFactory;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        factory(User::class, 20)->create(
            [
            'password' => bcrypt('secret'),
            'blood_type_id' => factory(BloodType::class)->make()->id
            ]
        );
        */

        UserFactory::new()->count(20)->create( [
            'password' => bcrypt('secret'),
            'blood_type_id' => BloodTypeFactory::new()->create()->id
            ]);


        $this->command->info('Users created sucessfully!');

    }
}
