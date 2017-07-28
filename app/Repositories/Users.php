<?php

namespace DoeSangue\Repositories;
use DoeSangue\Models\User;

class Users
{

    public function all()
    {
        return User::all();
    }

    public function findByUserName($username)
    {
        return User::whereUsername($username)->get();
    }

    public function filterActive()
    {
        //
        return User::whereActive(true)->get();
    }

    public function filterUnactive()
    {
        return User::whereActive(false)->get();
    }

}
