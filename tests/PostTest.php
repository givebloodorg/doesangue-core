<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{

    public function testCriarPost()
    {
        $post = factory(DoeSangue\Post::class, 4)->make();

    }

    public function testListarPosts()
    {
        $posts = DoeSangue\Post::all();
    }

}
