<?php

namespace GiveBlood\Support\Http\Controllers\User;

use Illuminate\Http\JsonResponse;
use JWTAuth;
use Illuminate\Http\Request;
use GiveBlood\Support\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Get Logged in User information.
     */
    public function userInfo(): JsonResponse
    {
        $user = JWTAuth::parseToken()->authenticate();

        // If the token is invalid
        if (!$user) {
            return response()->json([ 'invalid_user' ], 401);
        }


        //return var_dump($user->bloodType()->code);

        // Return the user data in json.
        return response()->json(
            [
            'first_name' =>   $user->first_name,
            'last_name'  =>   $user->last_name,
            'email'      =>   $user->email,
            'username'   =>   $user->username,
            'blood_type' =>   $user->bloodType->code,
            'avatar'     =>   '', //$user->avatar,
            'birthdate'  =>   $user->birthdate,
            'phone'      =>   $user->phone,
            'bio'        =>   $user->bio
            ], 200
        );

    }

    public function updateProfile(Request $data): void
    {
        //
    }
}
