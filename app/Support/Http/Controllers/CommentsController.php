<?php

namespace GiveBlood\Support\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use GiveBlood\Support\Http\Controllers\Controller;
use GiveBlood\Modules\Campaign\Comment;
use GiveBlood\Modules\Campaign\Campaign;
use Tymon\JWTAuth\Facades\JWTAuth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    public function index($campaign): JsonResponse
    {
        $comments = Comment::where('campaign_id', $campaign)->get();

        return response()->json($comments, 200);
    }

    public function create($campaign, Request $request):JsonResponse
    {

        $user = JWTAuth::parseToken()->authenticate();

        //$campaign = Campaign::find($id);
        $camp = Campaign::find($campaign);
        $comment = new Comment();
        $comment->id = Str::random(16);
        $comment->comment = $request[ 'comment' ];
        $comment->user_id = $user->id;
        $comment->campaign_id = $camp->id;
        $comment->created_at = Carbon::now();
        $comment->save();

        //  return response()->json($comment);
        return response()->json(
            [
            'status_code' => 201,
            'message' => 'Comment added!'
            ], 201
        );

    }

    public function update($campaign, $comment, Request $request): JsonResponse
    {

        $comment_item = Comment::find($comment);

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->id !== $comment_item->user_id) {
            return response()->json(
                [
                  'status_code' => 401,
                  'message' => "You haven't permission to update this entry"
                ], 401
            );
        }

        $comment_item->comment = $request[ 'comment' ];

        if (!$comment_item) {
            return response()->json(
                [
                    'error_code' => 404,
                    'error_message' => 'Comment not found!'
                ], 404
            );
        }

        $comment_item->save();

        return response()->json(
            [
            'status_code' => 200,
            'message' => 'Comment updated!'
            ], 200
        );
    }

    public function destroy($campaign, $comment):JsonResponse
    {

        $comment_item = Comment::find($comment);

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->id !== $comment_item->user_id) {
            return response()->json(
                [
                  'status_code' => 401,
                  'message' => "You haven't permission to update this entry"
                ], 401
            );
        }

          // Notify error in not found
        if (!$comment_item) {
            return response()->json(
                [
                  'error_code' => 404,
                  'message' => 'Comment not found!'
                ], 404
            );
        }

        $comment_item->delete();

        return response()->json(
            [
              'status_code' => 200,
              'message' => 'Comment deleted'
            ], 200
        );
    }
}
