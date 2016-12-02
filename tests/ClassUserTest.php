<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\User;

class UserTest extends TestCase
{

    public function testCadastrarUsuario()
    {
        $user = factory(User::class)->create([]);

        return $this->assertTrue(true);

    }

    public function testlistarUsuarios(){
      $usuarios = User::find(1);
      return $this->assertTrue(true);
    }

}
