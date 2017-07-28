<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\User;

class AuthTest extends TestCase
{
  use DatabaseTransactions;

    public function testUsercanRegister()
    {
      $user = factory(User::class)->create([
            'first_name' => 'Donor',
            'last_name' => 'Test',
            'username' => 'donor1',
            'email' => 'donors@doesangue.me',
            'phone' => '244949143413',
            'birthdate' => '19950104',
            'password' => bcrypt('123456789')
        ]);

       $request = $this->post('/api/v1/auth/register', [
          'first_name' => $user->first_name,
          'last_name' => $user->last_name,
          'username' => $user->username,
          'email' => $user->email,
          'phone' => $user->phone,
          'birthdate' => $user->birthdate,
          'password' => $user->password
        ])
        ->json(['token']);
      //$this->headers($user);

      return $this->assertEquals('201', $request->status());
    }

    /**
     * Test if the user can generate a token with email and pass.
     */
    public function testUsercanLogin()
    {
      // Create the user before login.
      $user = factory(User::class)->create(
          [
            'first_name' => 'Josimar',
            'last_name' => 'José',
            'username' => 'janilson',
            'email' => 'janilson.py2@gmail.com',
            'phone' => '244949143413',
            'birthdate' => '19950104',
            'password' => bcrypt('123456789')
          ]
        );

      $request = $this->post('/api/v1/auth/login',
        [
          'email' => 'janilson.py2@gmail.com',
          'password' => '123456789'
        ]);

      //  $this->headers($user);

        return $this->assertEquals('200', $request->status());
    }

    /**
     * Test if user can login.
     * @test
     *  Test: GET /api/v1/auth/register
     *
     * @return void
     */
    public function testUsercannotLogin()
    {
      $user = factory(User::class)->create();

      $request = $this->post('/api/v1/auth/login', [
        'email' => $user->email,
        'password' => '12345test'
        ]);
        //$this->headers($user);

        return $this->assertEquals('401', $request->status());
    }

}
