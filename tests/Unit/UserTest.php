<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\User;

class UserTest extends TestCase
{
    public function testCanRegisterUser()
    {
        $user = factory(User::class)->create([]);

        return $this->assertTrue(true);
    }

    public function testCanListUsers()
    {
        $users = User::all();

        return $this->assertTrue(true);
    }
}
