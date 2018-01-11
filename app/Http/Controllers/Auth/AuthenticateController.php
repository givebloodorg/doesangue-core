<?php

namespace DoeSangue\Http\Controllers\Auth;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use DoeSangue\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DoeSangue\Http\Requests\RegisterUserRequest;
use DoeSangue\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;
use DoeSangue\Models\User;

class AuthenticateController extends Controller
{
      /**
       * Authenticate the user
       *
       * @param  Request $request
       * @return \Illuminate\Http\JsonResponse
       */
    public function authenticate(Request $request)
    {

        try {

            // grab credentials from the request
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt(
                $request->only('email', 'password'), [
                'exp' => Carbon::now()->addWeek()->timestamp,
                ]
            )
            ) {
                return response()->json([ 'error' => 'invalid_credentials' ], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json([ 'error' => 'could_not_create_token' ], 500);
        }

        // all good so return the token
        return response()->json(
            [
            'access_token' => $token,
            'token_type' => 'Bearer'
            ], 200
        );
    }

    /**
     * Register a new User
     *
     * @param  RegisterUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterUserRequest $request)
    {
        $user = User::create(
            [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'country_code' => $request->country_code,
            'bio' => $request->bio,
            'blood_type_id' => $request->blood_type_id,
            'birthdate' => $request->birthdate,
            'password' => bcrypt($request->password),
            ]
        );

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
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
      $this->validate($request, ['token' => 'required']);

      try {
        JWTAuth::invalidate($request->input('token'));
        return response()->json(
          [
            'success' => true
          ]
        );
      } catch (JWTException $e) {
        // Something went wrong whilst attemping to encode the token
        return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.', 500]);
      }
    }

}
