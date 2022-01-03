<?php

namespace GiveBlood\Support\Http\Controllers;

use GiveBlood\Support\Http\Controllers\Controller;
use GiveBlood\Units\Core\Http\Resources\UserCollection;
use GiveBlood\Units\Core\Http\Resources\User as UserResource;
use GiveBlood\Modules\Users\User;

class UsersController extends Controller
{
    public function index(): UserCollection
    {

        return new UserCollection(User::paginate(50));

    }

    public function show($donor): UserResource
    {
        return new UserResource(User::find($donor));
    }

}
