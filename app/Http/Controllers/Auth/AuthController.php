<?php

namespace DoeSangue\Http\Controllers\Auth;

use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Models\User;
use Illuminate\Support\Facades\Auth;
use Socialite;

class AuthController extends Controller
{

    public function __construct()
    {
        //
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        // Getting the data from Google+
        $data = [
        'name' => $user->getName(),
        'email' => $user->getEmail()
        ];

        // Created a user with requested data
        Auth::login(User::firstOrCreate($data));

        // redirect to home
        return redirect()->route('home');
    }
}
