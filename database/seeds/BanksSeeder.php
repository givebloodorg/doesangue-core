<?php

use Illuminate\Database\Seeder;
use DoeSangue\Models\Bank;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('banks')->delete();

        factory(Bank::class, 10)->create();

        $this->command->info('Demo Blood Banks created sucessfully!');
    }
}
