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
        $this->middleware('guest', [ 'except' => 'logout' ]);
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
        'email' => $user->getEmail(),
        'username' => '',
        'password' => bcrypt('secret'),
        ];

        // Created a user with requested data
        Auth::login(User::firstOrCreate($data));

        // redirect to home
        return redirect()->route('home');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect('/');
    }
}
