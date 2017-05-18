<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DoeSangue\Models\Donor;
use DoeSangue\Models\User;
use DoeSangue\Models\BloodType;

class DonorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateDonor()
    {
        $user = factory(User::class)->create();
        $btype = factory(BloodType::class)->create();

        $donor = factory(Donor::class)->create(
            [
            'user_id' => $user->id,
            'blood_type_id' => $btype->id,
            ]
        );

        $this->assertEquals($btype->id, $donor->blood_type_id);
        $this->assertEquals($user->id, $donor->user_id);
    }
}
