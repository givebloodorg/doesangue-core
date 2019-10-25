<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BankTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllBanks()
    {
        $response = $this->json('GET', '/v1/banks');

        $response->assertStatus(200);
    }

}
