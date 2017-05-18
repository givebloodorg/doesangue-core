<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\User;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testLogin()
    {
        /*
        $user = factory(User::class)->create([]);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type($user->password, 'password')
            ->press('Login');
        */
    }

    public function testRegisterAndLogin()
    {
        /*  $this->visit('/register')
            ->type('José Cage', 'name')
            ->type('geral@josecage.com', 'email')
            ->type('josecage', 'username')
            ->type('244949143413', 'phone')
            ->type('123456789', 'password')
            ->press('Register');
        */
    }

    public function testLoginAndThenLogout()
    {

        /*
        $user = User::findOrFail('1');
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type($user->password, 'password')
            ->press('Login');
        */
    }
}
