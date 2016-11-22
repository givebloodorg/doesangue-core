<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\Post;

class PostTest extends TestCase
{

    public function testCriarPost()
    {
<<<<<<< 4da80d6577e9a5832dd03c1d377b4f411d154433
        $post = factory(Post::class)->create([]);

        return $this->assertTrue(true);

||||||| merged common ancestors
        $posts = DoeSangue\Post::all();
=======
        $post = factory(DoeSangue\Post::class, 4)->make();

>>>>>>> Adicionando FoundationCSS para o frontend
    }

    public function testListarPosts()
    {
<<<<<<< 4da80d6577e9a5832dd03c1d377b4f411d154433
        $posts = Post::all();

        return $this->assertTrue(true);
||||||| merged common ancestors
        $post = factory(DoeSangue\Post::class)->create();

=======
        $posts = DoeSangue\Post::all();
>>>>>>> Adicionando FoundationCSS para o frontend
    }

}
