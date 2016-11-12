<?php

namespace DoeSangue\Http\Controllers;

use Illuminate\Http\Request;
use DoeSangue\Http\Requests;

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
