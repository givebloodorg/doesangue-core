<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuarioTest extends TestCase
{

    public function testCadastrarUsuario()
    {
        $usuario = factory(DoeSangue\User::class, 3)->make();

    }
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testListUsuarioWhere()
    {
        $this->seeInDatabase(
            'users', [
            'id' => '1'
            ]
        );

    }

}
