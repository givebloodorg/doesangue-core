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

      return redirect()->route('users.profile', $user->id);
    }
}
