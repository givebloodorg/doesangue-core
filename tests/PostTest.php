<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{

    public function testListarPostWhere()
    {
      $posts = DoeSangue\Post::all();
    }

    public function testCriarPost()
    {
        $post = factory(DoeSangue\Post::class)->create();

    }

}
