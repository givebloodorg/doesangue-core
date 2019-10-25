<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response
            ->assertJson(
                [
                'message' => 'Hello World!'
                ]
            )
            ->assertJsonStructure(
                [
                'message'
                ]
            );


        $response->assertStatus(200);
    }
}
