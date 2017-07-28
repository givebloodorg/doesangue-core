<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\User;
use DoeSangue\Models\Campaign;

class CampaignTest extends TestCase
{
  use DatabaseTransactions;

    public function testCreateCampaign()
    {
      $user = factory(User::class)->create();

      //$this->headers($user);

        $token = \JWTAuth::fromUser($user);

        \JWTAuth::setToken($token);

       $request = $this->post('/api/v1/campaigns', [
          'title' => 'This is just a basic test for our API!',
          'expires' => \Carbon\Carbon::now()->endOfYear(),
          'token' => $token

        ]);

      return $this->assertEquals('201', $request->status());
    }

    public function getAllCampaigns()
    {
      $campaigns = factory(Campaign::class, 10)->create();

      $request = $this->get('/api/v1/campaigns');

       return $this->assertStatus(201);
    }

}
