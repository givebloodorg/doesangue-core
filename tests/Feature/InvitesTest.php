<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\User;

class InvitesTest extends TestCase
{

  use DatabaseTransactions;
    /**
     * Test if user/donor can create Invite.
     * @return void
     */
    public function testUserCanCreateInvite()
    {
      // Create the user (owner of Invite)
      $user = factory(User::class)->create();

      // Generate the token
      $token = \JWTAuth::fromUser($user);

      \JWTAuth::setToken($token);

      // Send the post request with data.
      $request = $this->post('/api/v1/invites', [
          'invite_code' => 'Welcome2018',
          'user_id' => $user->id
        ]);

      // Set the current user's token to Header.
        $this->headers($user);

      // Check if the request was sucessfully send.
      return $this->assertEquals(201, $request->status());

    }
    /**
     * Test if user/donor cant create Invite.
     * @return void
     */
    public function testUserCantCreateInvite()
    {
      //
    }

    public function testUserCanDeleteInvite()
    {
      //
    }
}
