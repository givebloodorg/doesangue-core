<?php

namespace Tests\Feature;

use Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use GiveBlood\Modules\Users\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if user can create account (register)
     * Test: Get /v1/auth/register
     *
     * @test
     */
    public function testUserCanRegister(): void
    {

        /* $request = $this->post(
            '/v1/auth/register', [
            'first_name' => 'Doe Sangue',
            'last_name' => "Tester",
            'username' => 'member1',
            'email' => 'info@doesangue.me',
            'phone' => '244932401234',
            'birthdate' => '19890401',
            'password' => 'secret1234'
            ]
        );*/

        $response = $this->json(
            'POST', 'v1/invitation',
            [
            'first_name' => 'Gamer',
            'last_name' => 'Tester',
            'guest_email' => 'gamer.tester@internet.io',
            'country_id' => '1',
            'token' => Hash::make(str_random(60))
            ]
        );

        $response
            ->assertStatus(201)
            ->assertJsonStructure(
                [
                'message'
                ]
            );
    }

    /**
     * Test if the user can generate a token with email and pass.
     *
     * @test
     */
    public function testuserCanLogin(): void
    {
        // Create the user before login.
        $user = factory(User::class)->create();

        $response = $this->json(
            'POST', 'v1/auth/login',
            [
            'email' => $user->email,
            'password' => 'secret'
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                'access_token',
                'token_type'
                ]
            );

        /* $request = $this->post(
            '/v1/auth/login',
            [
            'email' => $user->email,
            'password' => 'secret'
            ]
        );*/

    }

    /**
     * Test if user cannot login.
     *
     * @test
     *  Test: GET /v1/auth/register
     */
    public function testUserCannotLogin(): void
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
