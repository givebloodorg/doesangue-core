<?php

namespace DoeSangue\Http\Controllers;

use DoeSangue\User;

class UsersController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('name', 'id')->get();

        return response()->view('usuarios.index', compact('usuarios'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'username' => 'required',
            'bio' => 'required',
            'telefone' => 'required',
            ]
        );

      $usuario = new User();
      $usuario->name = $request[ 'name' ];
      $usuario->email = $request[ 'email' ];
      $usuario->password = $request[ 'password' ];
      $usuario->username = $request[ 'username' ];
      $usuario->bio = $request[ 'bio' ];
      $usuario->telefone = $request[ 'telefone' ];
      $usuario->save();

      return redirect()->route('perfil');
    }
}
