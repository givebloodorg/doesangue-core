<?php

namespace DoeSangue\Http\Controllers\Auth;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use DoeSangue\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DoeSangue\Http\Requests\RegisterUserRequest;
use DoeSangue\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;
use DoeSangue\Models\User;
use DoeSangue\Models\Donor;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([ 'error' => 'invalid_credentials' ], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json([ 'error' => 'could_not_create_token' ], 500);
        }

        // all good so return the token
        return response()->json(
            [
             "data" {
                'access_token' => $token,
                'token_type' => 'Bearer'
             }
            ]
        );
    }

    // Register a new user
    public function register(RegisterUserRequest $request)
    {
        $user = User::create(
            [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            // create the username based on first_name and last_name
            // if not provided
            /*$userName = trim(strtolower($request->first_name.'-'.$request->last_name)),
            'username' => $userName,*/
            'username' => $request->username,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'birthdate' => $request->birthdate,
            'password' => bcrypt($request->password),
            ]
        );

        if ($user) {
            $donor = new Donor();
            $donor->user_id = $user->id;
            $donor->blood_type_id = null;
            $donor->save();
        }

        // Send mail to user
        Mail::to($user->email)->send(new UserCreated($user));



        $token = JWTAuth::attempt($request->only('email', 'password'));

        // all good so return the token
        return response()->json(
            [
            'access_token' => $token,
            'token_type' => 'Bearer'
            ], 201
        );
    }

    /**
     * Invalidate and log out the user
     */
    public function logout()
    {
        //
    }

    public function userInfo()
    {
        $user = JWTAuth::parseToken()->authenticate();

        // If the token is invalid
        if (! $user) {
            return response()->json(['invalid_user'], 401);
        }

        return response()->json(
            [
              'first_name' => $user->first_name,
              'last_name' => $user->last_name,
            //   'email' => $user->email,
              'username' => $user->username
            ], 200
        );
    }
}
