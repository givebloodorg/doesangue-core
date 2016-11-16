<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{

    public function testListarPostWhere()
    {

      $this->seeInDatabase(
          'posts', [
          'id' => '1'
          ]
      );
    }

    public function testCriarPost()
    {
        $post = factory(DoeSangue\Post::class)->make();
    }

}
