<?php

use Illuminate\Database\Seeder;

class CampaignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Campanhas criadas!');

        DB::table('campaigns')->truncate();
        DB::table('campaigns')->insert(
            [
            array('title' => 'Campanha de teste do sistema', 'user_id' => '1', 'expires' => \Carbon\Carbon::now()->endOfYear(), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()),
            array('title' => 'Solicitação de ajuda pela comunidade', 'user_id' => '2', 'expires' => \Carbon\Carbon::now()->endOfYear(), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()),
            ]
        );
    }
}
