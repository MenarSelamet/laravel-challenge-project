<?php

namespace Tests\Unit;

use App\Models\Integration;
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
    public function test_update_integration()
    {

        $integration = Integration::factory()->create([
            'marketplace' => 'n11',
            'username' => 'olduser',
            'password' => 'oldpassword',
        ]);

        $data = [
            'marketplace' => 'trendyol',
            'username' => 'newuser',
            'password' => 'newpassword',
        ];


        $response = $this->put('/api/integrations/' . $integration->id, $data);


        $response->assertStatus(200);


    }
}