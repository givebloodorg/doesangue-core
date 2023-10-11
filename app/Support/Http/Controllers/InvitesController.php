<?php

namespace GiveBlood\Support\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use GiveBlood\Support\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use GiveBlood\Modules\Users\Invite;
use Hash;

class InvitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', [ 'except' => [ 'invite' ] ]);
    }

    public function create(Request $request): JsonResponse
    {
        // Determines the user/owner of invite.
        $user = JWTAuth::parseToken()->authenticate();

        $invite = new Invite();
        $invite->invite_code = Hash::make($request[ 'invite_code' ]);
        $invite->user_id = $user->id;
        $invite->save();

        return response()->json(
            [
            'status_code' => 201,
            'message' => 'Invite created!'
            ], 201
        );
    }

    public function show($invite): JsonResponse
    {
        $invite_item = Invite::find($invite);

        return response()->json($invite_item, 200);
    }

}
