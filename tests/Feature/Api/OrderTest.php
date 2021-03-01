<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * Error Createding Order.
     *
     * @return void
     */
    public function testErrorCreateding()
    {
        $payload =[];
        $response = $this->postJson('/api/v1/orders', $payload);

        $response->assertStatus(422)
                        ->assertJsonPath('errors.token_company', [
                            trans('validation.required', ['attribute' => 'token company'])
                        ])
                        ->assertJsonPath('errors.products', [
                            trans('validation.required', ['attribute' => 'products'])
                        ]);
       
    }

    /**
     * Error Create New Order Token Company.
     *
     * @return void
     */
    public function testErrorCreateNewOrderTokenCompany()
    {
        $tenant = factory(Tenant::class)->create();

        $payload =[
            'token_company' =>$tenant->uuid,
            'product' => []
        ];
        $response = $this->postJson('/api/v1/orders',$payload);

        $response->assertStatus(422);
    }

    /**
     * Error Create New Order Product.
     *
     * @return void
     */
    public function testErrorCreateNewOrderProduct()
    {
        $product = factory(Product::class)->create();
        


        $payload =[
            'token_company' =>"fake_value",
            'product' => $product
        ];
        $response = $this->postJson('/api/v1/orders',$payload);

        $response->assertStatus(422);
    }

    /**
     * Create New Order.
     *
     * @return void
     */
    public function testCreateNewOrder()
    {
        $tenant = factory(Tenant::class)->create();
    
        $payload =[
            'token_company' =>$tenant->uuid,
            'products' => []
        ];

        $products = factory(Product::class, 3)->create();
        foreach($products as $product){
            array_push($payload['products'],[
                'identify' => $product->uuid,
                'qty' => 2,
            ]);
        }
        
        $response = $this->postJson('/api/v1/orders',$payload);

        $response->assertStatus(201);
    }

    /**
     * Total Order.
     *
     * @return void
     */
    public function testTotalOrder()
    {
        $tenant = factory(Tenant::class)->create();
    
        $payload =[
            'token_company' =>$tenant->uuid,
            'products' => []
        ];

        $products = factory(Product::class, 2)->create();
        foreach($products as $product){
            array_push($payload['products'],[
                'identify' => $product->uuid,
                'qty' => 1,
            ]);
        }
        
        $response = $this->postJson('/api/v1/orders',$payload);
        

        $response->assertStatus(201)
                            ->assertJsonPath('data.total', 25.8 );
    }
    
}
