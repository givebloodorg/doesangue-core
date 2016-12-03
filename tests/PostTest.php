<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\Post;
use DoeSangue\Models\User;


class PostTest extends TestCase
{

    public function testCreatePost()
    {
        $user = factory(User::class)->create([]);

        $post = factory(Post::class)->create([]);

         return $this->assertTrue(true);
    }

    public function testListAllPosts()
    {
        $posts = Post::all();

        return $this->assertTrue(true);
    }

}
