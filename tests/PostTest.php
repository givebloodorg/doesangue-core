<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Post;

class PostTest extends TestCase
{

    public function testCriarPost()
    {
        $post = factory(DoeSangue\Post::class, 5)->create([]);

        return $this->assertTrue(true);

    }

    public function testListarPosts()
    {
        $posts = Post::all();

        return $this->assertTrue(true);
    }

}
