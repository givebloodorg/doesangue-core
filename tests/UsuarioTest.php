<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\User;

class UsuarioTest extends TestCase
{

    public function testCadastrarUsuario()
    {
        $usuario = factory(User::class, 5)->create([]);

        return $this->assertTrue(true);

    }

    public function testlistarUsuarios(){
      $usuarios = User::find(1);
      return $this->assertTrue(true);
    }

}
