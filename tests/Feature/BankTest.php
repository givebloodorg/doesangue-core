<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class BankTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function testGetAllBanks(): void
    {
        $response = $this->json('GET', '/v1/banks');

        $response->assertStatus(200);
    }

}
