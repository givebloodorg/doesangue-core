<?php

namespace GiveBlood\Units\Authentication\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use GiveBlood\Support\Http\Controllers\Controller;
use GiveBlood\Modules\Users\User;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    /**
     * Password recover
     */
    public function recover(Request $request) :  JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $error_message = "Your email address was not found.";
            return response()->json([ 'success' => false, 'error' => [ 'email' => $error_message ] ], 401);
        }

        try {
            Password::sendResetLink(
                $request->only('email')
            );
        } catch (Exception $exception) {
            // Return with error
            $error_message = $exception->getMessage();
            return response()->json([ 'success' => false, 'error' => $error_message ], 401);
        }

        return response()->json(
            [
            'success' => true,
            'data' => [ 'message' => 'A reset email has been sent! Please check your email.' ]
            ]
        );
    }
}
