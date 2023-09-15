<?php

namespace Tests\Feature;

use GiveBlood\Modules\Users\Database\Factories\UserFactory;
use Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use GiveBlood\Modules\Users\User;
use Illuminate\Support\Str;

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

         $request = $this->post(
            '/v1/auth/register', [
            'first_name' => 'Doe Sangue',
            'last_name' => "Tester",
            'username' => 'member1',
            'email' => 'info@doesangue.me',
            'phone' => '244932401234',
            'country_id'=>'2',
            'bio'=>"I'm amazing",
            'blood_type_id'=>'01157557-7f4d-4bf1-9d5e-9c93338acd42',
            'birthdate' => '19890401',
            'password' => 'secret1234'
            ]
        );

        /*
        $response = $this->json(
            'POST', 'v1/invitation',
            [
            'first_name' => 'Gamer',
            'last_name' => 'Tester',
            'guest_email' => 'gamer.tester@internet.io',
            'country_id' => '1',
            'token' => Hash::make(Str::random(60))
            ]
        );
        */

        $request
            ->assertStatus(201) ->assertJsonStructure(
                [
                'access_token',
                'token_type'
                ]
            );;
    }

    /**
     * Test if the user can generate a token with email and pass.
     *
     * @test
     */
    public function testuserCanLogin(): void
    {
        // Create the user before login.
       // $user = factory(User::class)->create();
       $user = UserFactory::new()->create();

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
       // $user = factory(User::class)->create();
       $user = UserFactory::new()->create();


        $request = $this->post(
            '/v1/auth/login', [
            'email' => $user->email,
            'password' => '12345test'
            ]
        );

        $request->assertStatus(401);

    }

}
