<?php

namespace Tests\Feature;

use Tests\TestCase;
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

        $post = factory(Post::class)->create(
            [
            'user_id' => $user->id,
            ]
        );

         return $this->assertEquals($user->id, $post->user_id);
    }

    public function testListAllPosts()
    {
        $posts = Post::all();

        return $this->assertTrue(true);
    }
}
