<?php

namespace DoeSangue\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;

use DoeSangue\Http\Requests;

use DoeSangue\User;

=======
>>>>>>> development
class UsersController extends Controller
{
    /**
     * Listar todos Usuários cadastrados.
     *
     * @method index
     *
     * @return array
     */
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }
}
