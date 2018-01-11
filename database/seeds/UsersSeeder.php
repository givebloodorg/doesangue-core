<?php

use Illuminate\Database\Seeder;
use DoeSangue\Models\User;
use DoeSangue\Models\BloodType;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(User::class, 20)->create([
            'password' => bcrypt('1234567890'),
            'blood_type_id' => factory(BloodType::class)->create()->id
          ]);

        $this->command->info('Users created sucessfully!');

    }
}
