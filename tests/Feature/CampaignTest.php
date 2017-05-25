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

    public function testCreateCampaign()
    {

        $user = factory(User::class)->create();

        $ampaign = factory(Campaign::class)->create(
            [
            'user_id' => $user->id
            ]
        );

        $this->assertTrue(true);
    }

    public function getAllCampaigns()
    {
        $campaigns = Campaign::all();

        return $this->assertTrue(true);
    }

}
