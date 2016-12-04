<?php

namespace DoeSangue\Http\Controllers;

use DoeSangue\Http\Requests\UserProfileRequest;
use DoeSangue\Models\User;
use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'id')->get();

        return view('users.index', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('perfil', $user->id);
    }

    public function profile(Request $request, $id)
    {

        $user = User::find($id);

        return view('donors.show', compact('user'));
    }
}
