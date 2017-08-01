<?php

namespace DoeSangue\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use DoeSangue\Repositories\Invites;
use DoeSangue\Models\Invite;
use Hash;

class InvitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', [ 'except' => [ 'invite' ] ]);
    }

    public function create(Request $request)
    {
        // Determines the user/owner of invite.
        $user = JWTAuth::parseToken()->authenticate();

        $invite = new Invite();
        $invite->invite_code = Hash::make($request['invite_code']);
        $invite->user_id = $user->id;
        $invite->save();

        return response()->json(
            [
            'status_code' => 201,
            'message' => 'Invite created!'
            ], 201
        );
    }

    public function show($id)
    {
        $invite = Invite::find($id);

        return response()->json($invite, 200);
    }

}
