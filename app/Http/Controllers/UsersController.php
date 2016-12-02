<?php

namespace DoeSangue\Http\Controllers;

<<<<<<< HEAD
use DoeSangue\Http\Requests\UserProfileRequest;
use DoeSangue\Models\User;
||||||| merged common ancestors
use DoeSangue\User;
=======

use DoeSangue\Http\Requests\UserProfileRequest;
use DoeSangue\Models\User;
use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;

>>>>>>> 4c37c57

class UsersController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $users = User::orderBy('name', 'id')->get();
||||||| merged common ancestors
        $usuarios = User::orderBy('name', 'id')->get();
=======
>>>>>>> 4c37c57

<<<<<<< HEAD
        return view('users.index', compact('users'));
||||||| merged common ancestors
        return response()->view('usuarios.index');
=======
        $users = User::orderBy('name', 'id')->get();

        return view('users.index', compact('users'));

>>>>>>> 4c37c57
    }

    public function update(UserProfileRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

      return redirect()->route('users.profile', $user->id);
    }
}
