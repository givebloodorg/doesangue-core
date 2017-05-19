<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Posts criados!');

        DB::table('posts')->delete();
        DB::table('posts')->insert(
            [
            array('title' => 'A evolução das tecnologias sociais', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'image' => 'file:///home/josecage/workspace/inspinia-theme/img/profile_big.jpg', 'user_id' => '1', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()),
            array('title' => 'Como criamos a plataforma', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'image' => 'file:///home/josecage/workspace/inspinia-theme/img/profile_big.jpg', 'user_id' => '2', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()),
            array('title' => 'Quantos pessoas se beneficiam com a plataforma?', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'image' => 'file:///home/josecage/workspace/inspinia-theme/img/profile_big.jpg', 'user_id' => '3', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()),
            ]
        );
    }
}
