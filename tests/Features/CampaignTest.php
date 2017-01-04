<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\User;
use DoeSangue\Models\Campaign;

class CampaignTest extends TestCase
{

    public function testCreateCampaign()
    {

        $author = factory(User::class)->create();

        $campaign = factory(Campaign::class)->create(
            [
            'id_user' => $author->id,
            ]
        );

        $this->assertEquals($author->id, $campaign->id_user);
    }
}
