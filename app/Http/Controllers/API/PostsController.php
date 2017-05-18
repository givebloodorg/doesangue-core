<?php

namespace DoeSangue\Http\Controllers\API;

use Illuminate\Http\Request;
use DoeSangue\Http\Requests\CreatePostRequest;
use DoeSangue\Http\Requests\UpdatePostRequest;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::all();

        return response()->json(compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
          return response()->json(
            [
              'error_code' => '404',
              'message' => 'Post not found!'
            ], 404);
        }

        return response()->json(compact('post'));
    }

    public function store(CreatePostRequest $request)
    {
        $post = new Post();
        $post->title = $request[ 'title' ];
        $post->content = $request[ 'content' ];
        $post->image = $request[ 'image' ];
        $post->user_id = $request[ 'user_id' ];

        return response()->json(compact('post'));
    }

    /**
     * Update Post by ID
     *
     * @method update
     *
     * @param UpdatePostRequest $request
     * @param integer           $id
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Campaign::find($id);
        $post->title = $request[ 'title' ];
        $post->content = $request[ 'content' ];
        $post->image = $request[ 'image' ];
        $post->user_id = $request[ 'user_id' ];
        $post->save();

        return response()->json([ 'message' => 'Post Updated' ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);


        if (!$post) {
          return response()->json(
            [
              'error_code' => '404',
              'message' => 'Post not found!'
            ], 404);
        }

        $post->delete();

        return response()->json(
          [
            'title' => $post->title,
            'content' => $post->content,
            'image' => $post->image,
            'user_id' => $post->user_id,
            'message' => 'Post delected',
          ]);
    }
}
