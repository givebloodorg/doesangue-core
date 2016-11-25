<?php

namespace DoeSangue\Http\Controllers;

use DoeSangue\Http\Requests\UserProfileRequest;
use DoeSangue\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'id')->get();

        return view('users.index', compact('users'));
    }

    public function update(UserProfileRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

<<<<<<< HEAD
        $usuario = new User();
        $usuario->name = $request[ 'name' ];
        $usuario->email = $request[ 'email' ];
        $usuario->password = $request[ 'password' ];
        $usuario->username = $request[ 'username' ];
        $usuario->bio = $request[ 'bio' ];
        $usuario->telefone = $request[ 'telefone' ];
        $usuario->save();

        return redirect()->route('perfil_user', $usuario->id);
=======
      return redirect()->route('users.profile', $user->id);
>>>>>>> 2997d6b361ca1e02741c8daf8458d44b41d8a305
    }
}
