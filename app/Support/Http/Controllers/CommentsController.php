<?php

namespace GiveBlood\Support\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use GiveBlood\Support\Http\Controllers\Controller;
use GiveBlood\Modules\Campaign\Comment;
use GiveBlood\Modules\Campaign\Campaign;
use Tymon\JWTAuth\Facades\JWTAuth;
use Carbon\Carbon;

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

    public function create(Request $request, $campaign): JsonResponse
    {

        $user = JWTAuth::parseToken()->authenticate();

        //$campaign = Campaign::find($id);
        $camp = Campaign::find($campaign);
        $comment = new Comment();
        $comment->id = str_random();
        $comment->comment = $request[ 'comment' ];
        $comment->user_id = $user->id;
        $comment->campaign_id = $camp->id;
        // $comment->created_at = Carbon::now();
        $comment->save();

        //  return response()->json($comment);
        return response()->json(
            [
            'status_code' => 201,
            'message' => 'Comment added!'
            ], 201
        );

    }

    public function update($id, Request $request): JsonResponse
    {
        $comment = Comment::find($id);

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->id !== $comment->user_id) {
            return response()->json(
                [
                  'status_code' => 401,
                  'message' => "You haven't permission to update this entry"
                ], 401
            );
        }

        $comment->comment = $request[ 'comment' ];

        if (!$comment) {
            return response()->json(
                [
                    'error_code' => 404,
                    'error_message' => 'Comment not found!'
                ], 404
            );
        }

        $comment->save();

        return response()->json(
            [
            'status_code' => 200,
            'message' => 'Comment updated!'
            ], 200
        );
    }

    public function destroy($id): JsonResponse
    {
        $Comment = null;
        $comment = Comment::find($id);

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->id !== $comment->user_id) {
            return response()->json(
                [
                  'status_code' => 401,
                  'message' => "You haven't permission to update this entry"
                ], 401
            );
        }

          // Notify error in not found
        if (!$comment) {
            return response()->json(
                [
                  'error_code' => 404,
                  'message' => 'Comment not found!'
                ], 404
            );
        }

        $Comment->delete();

        return response()->json(
            [
              'status_code' => 204,
              'message' => 'Comment deleted'
            ], 204
        );
    }
}
