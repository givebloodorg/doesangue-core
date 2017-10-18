<?php

namespace DoeSangue\Http\Controllers\API\V1\User;

use JWTAuth;
use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Get Logged in User information.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userInfo()
    {
        $user = JWTAuth::parseToken()->authenticate();

        // If the token is invalid
        if (!$user) {
            return response()->json([ 'invalid_user' ], 401);
        }
        // Return the user data in json.
        return response()->json(
            [
            'first_name' =>   $user->first_name,
            'last_name'  =>   $user->last_name,
            'email'      =>   $user->email,
            'username'   =>   $user->username,
            'blood_type' =>   $user->donor->bloodType->code,
            'avatar'     =>   '', //$user->avatar,
            'birthdate'  =>   $user->birthdate,
            'phone'      =>   $user->phone,
            'bio'        =>   $user->bio
            ], 200
        );

    }

    public function updateProfile(Request $data)
    {
      //
    }
}
