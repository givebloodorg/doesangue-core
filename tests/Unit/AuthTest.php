<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\User;

class AuthTest extends TestCase
{
  use DatabaseMigrations;

    /**
     * Test if the user can generate a token with email and pass.
     */
    public function testCreateToken()
    {
      // Create the user before login.
      $user = factory(User::class)->create();

      $request = $this->post('/api/auth/login',
        [
          'email' => $user->email,
          'password' => $user->password
        ]);

      return $request->assertStatus(200);
    }

    /**
     * Test if user can login.
     *
     * @return void
     */
    public function testLoginWithToken()
    {
      //
    }
}
