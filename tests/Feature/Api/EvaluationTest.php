<?php

namespace Tests\Feature\Api;

use Illuminate\Support\Str;
use App\Models\{
    Client,
    Order
};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EvaluationTest extends TestCase
{
    /**
     * Test Error Create New Evaluation
     *
     * @return void
     */
    public function testErrorCreateNewEvaluation()
    {
        $client = factory(Client::class)->create();
        $order = 'Fake_value';
        $token = $client->createToken(Str::random(10))->plainTextToken;
        $response = $this->postJson("/api/auth/v1/orders/{$order}/evaluations",
        [
            'Authorization' => "Bearer {$token}",
        ]);

        $response->assertStatus(401);
    }

    /**
     * Test Create New Evaluation
     *
     * @return void
     */
    public function testCreateNewEvaluation()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken; 

        $order = $client->orders()->save(factory(Order::class)->make());

        $payload = [
            'stars' => 5,
            'comment' => Str::random(10),
        ];
       
        $headers = [
            'Authorization' => "Bearer {$token}",
        ];

        $response = $this->postJson("/api/auth/v1/orders/{$order}/evaluations", 
            $payload,
            $headers,
        );

        $response->assertStatus(200);
    }
}
