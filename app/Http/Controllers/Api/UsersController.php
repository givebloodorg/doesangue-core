<?php

namespace DoeSangue\Http\Controllers\Api;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\User;

class UsersController extends Controller
{
    public function index(){

      $usuarios = User::orderBy('name', 'id')->get();

       return response()->json($usuarios);
    }
}
