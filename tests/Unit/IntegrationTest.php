<?php

namespace Tests\Unit;
use Tests\TestCase;


class IntegrationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }
    public function test_create_integration()
    {
        $integrationData = [
            'marketplace' => 'n11',
            'username' => 'Menar Selamet',
            'password' => 'secret',
        ];
        $response = $this->post('/api/integrations', $integrationData);

        $response->assertStatus(200);
    }
}