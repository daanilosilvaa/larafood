<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Error create new Client
     *
     * @return void
     */
    public function testErrorCreateNewClient()
    {
        $payload = [
            'email' => 'daanilo-silvaa@hotmail.com'
        ];
        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(422);
    }


    /**
     *  create new Client
     *
     * @return void
     */
    public function testCreateNewClient()
    {
        $client = factory(Client::class)->create();
        $payload = [
            'name' => 'Danilo silva',
            'email' => 'daanilo-silvaa@hotmail.com',
            'password' => '123456',
        ];
        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(201)
                    ->assertExactJson([
                        "data" =>[
                            'name'      => $payload['name'],
                            'email'  => $payload['email']
                        ]
                    ]);
    }

 
}
