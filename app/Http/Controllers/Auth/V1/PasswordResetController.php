<?php

namespace DoeSangue\Http\Controllers\Auth\V1;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\User;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    /**
     * Password recover
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recover(Request $request)
    {
      $user = User::where('email', $request->email)->first();
      if (!$user) {
        $error_message = "Your email address was not found.";
        return response()->json(['success' => false, 'error' => ['email' => $error_message]], 401);
      }

      try {
        Password::sendResetLink($request->only('email'), function(Message $message) {
          $message->subject('Your Password Reset Link');
        });
      } catch (Exception $e) {
        // Return with error
        $error_message = $e->getMessage();
        return response()->json(['success' => false, 'error' => $error_message], 401);
      }

      return response()->json([
        'success' => true,
        'data' => ['message' => 'A reset email has been sent! Please check your email.']
        ]);
    }
}
