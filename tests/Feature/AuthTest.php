<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\User;

class AuthTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * Test if user can create account (register)
     * Test: Get /v1/auth/register
     *
     * @return void
     */
    public function testUsercanRegister()
    {

        $request = $this->post(
            '/v1/auth/register', [
            'first_name' => 'Doe Sangue',
            'last_name' => "Tester",
            'username' => 'member1',
            'email' => 'info@doesangue.me',
            'phone' => '244932401234',
            'birthdate' => '19890401',
            'password' => 'secret1234'
            ]
        );

        $request->assertStatus(201);
    }

    /**
     * Test if the user can generate a token with email and pass.
     */
    public function testUsercanLogin()
    {
        // Create the user before login.
        $user = factory(User::class)->create();

        $request = $this->post(
            '/v1/auth/login',
            [
            'email' => $user->email,
            'password' => 'secret'
            ]
        );
    
        $request->assertStatus(200);
        // return $this->assertEquals('200', $request->status());
    }

    /**
     * Test if user cannot login.
     *
     * @test
     *  Test: GET /v1/auth/register
     *
     * @return void
     */
    public function testUsercannotLogin()
    {
        $user = factory(User::class)->create();

        $request = $this->post(
            '/v1/auth/login', [
            'email' => $user->email,
            'password' => '12345test'
            ]
        );

        $request->assertStatus(401);

    }

}
