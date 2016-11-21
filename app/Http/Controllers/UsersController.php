<?php

namespace DoeSangue\Http\Controllers;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\User;
use DoeSangue\Doador;

class UsersController extends Controller
{
    public function index()
    {

        $usuarios = User::orderBy('name', 'id')->get();

        return response()->view('usuarios.index');
    }

    public function update()
    {
        $this->validate(
            $request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'username' => 'required',
            'bio' => 'required',
            ]
        );
    }
}
