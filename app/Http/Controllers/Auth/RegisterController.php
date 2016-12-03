<?php

namespace DoeSangue\Http\Controllers\Auth;

use DoeSangue\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DoeSangue\Models\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data, [
            'name' => 'required|max:255',
            'phone' => 'required|max:20|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:20',
            'password' => 'required|min:8|confirmed',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        return User::create(
            [
            'name' => $data[ 'name' ],
            'phone' => $data[ 'phone' ],
            'email' => $data[ 'email' ],
            'username' => $data[ 'username' ],
            'password' => bcrypt($data[ 'password' ]),
            ]
        );
    }
}
