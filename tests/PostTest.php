<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\Post;

class PostTest extends TestCase
{

    public function testCriarPost()
    {
        $post = factory(Post::class)->create([]);

        return $this->assertTrue(true);

    }

    public function testListarPosts()
    {
        $posts = Post::all();

        return $this->assertTrue(true);
    }

}
