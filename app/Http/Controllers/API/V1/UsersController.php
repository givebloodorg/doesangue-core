<?php

namespace DoeSangue\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Http\Resources\UserCollection;
use DoeSangue\Http\Resources\User as UserResource;
use DoeSangue\Models\User;

class UsersController extends Controller
{
    public function index()
    {

      return new UserCollection(User::paginate(50));

    }

    public function show($donor)
    {
      return new UserResource(User::find($donor));
    }

}
