<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuarioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testListUsuarioWhere()
    {
      $this->seeInDatabase('users', [
        'email' => 'demo@doesangueapp.dev'
      ]);

    }

    public function testCadastrarUsuario()
    {
      $usuario = factory(DoeSangue\User::class, 3)->make();

    }
}
