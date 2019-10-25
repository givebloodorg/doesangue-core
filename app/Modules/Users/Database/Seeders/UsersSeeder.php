<?php

namespace GiveBlood\Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use  GiveBlood\Modules\Users\User;
use  GiveBlood\Modules\Blood\BloodType;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(User::class, 20)->create(
            [
            'password' => bcrypt('secret'),
            'blood_type_id' => factory(BloodType::class)->make()->id
            ]
        );

        $this->command->info('Users created sucessfully!');

    }
}
