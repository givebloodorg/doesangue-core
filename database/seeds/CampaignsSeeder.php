<?php

use Illuminate\Database\Seeder;
use DoeSangue\Models\User;
use DoeSangue\Models\Campaign;

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

        DB::table('campaigns')->delete();

          factory(User::class, 20)->create()->each(function ($u) {
            $u->campaigns()->save(factory(Campaign::class)->make());
          });
            /*[
              array('title' => 'Campanha de teste do sistema', 'description' => 'Campanha teste! Campanha teste!Campanha teste!Campanha teste! Campanha teste! Campanha teste!Campanha teste!', 'image' => '', 'user_id' => '1', 'expires' => \Carbon\Carbon::now()->endOfYear(), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()),
              array('title' => 'Solicitação de ajuda pela comunidade', 'description' => 'Campanha teste! Campanha teste! Campanha teste! Campanha teste!Campanha teste!Campanha teste!', 'image' => '', 'user_id' => '2', 'expires' => \Carbon\Carbon::now()->endOfYear(), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()),
              array('title' => 'Solicitação de ajuda pela comunidade', 'description' => 'Campanha teste! Campanha teste! Campanha teste! Campanha teste!Campanha teste!Campanha teste!', 'image' => '', 'user_id' => '2', 'expires' => \Carbon\Carbon::now()->endOfYear(), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()),
              array('title' => 'Solicitação de ajuda pela comunidade other', 'description' => 'Campanha teste! Campanha teste! Campanha teste! Campanha teste!Campanha teste!Campanha teste!', 'image' => '', 'user_id' => '2', 'expires' => \Carbon\Carbon::now()->endOfYear(), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()),
              array('title' => 'Solicitação de ajuda pela comunidade one another', 'description' => 'Campanha teste! Campanha teste! Campanha teste! Campanha teste!Campanha teste!Campanha teste!', 'image' => '', 'user_id' => '2', 'expires' => \Carbon\Carbon::now()->endOfYear(), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()),
            ]*/
    }
}
