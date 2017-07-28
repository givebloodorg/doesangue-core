<?php

namespace DoeSangue\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Repositories\Users;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::all();

        return response()->json($users, 200);
    }

    public function active()
    {
        $users = Users::filterActive();

        return response($users, 200);
    }
}
