<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{

    public function testListarPostWhere(){

      $this->seeInDatabase('posts', [
        'autor_id' => '1',
      ]);
    }

    public function testCriarPost()
    {
      $post = factory(DoeSangue\Post::class, 4)->make();
    }

}
