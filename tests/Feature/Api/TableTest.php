<?php

namespace Tests\Feature\Api;

use App\Models\Table;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TableTest extends TestCase
{
   /**
     * Error  Get Table by Tenant
     *
     * @return void
     */
    public function testGetAllTableTenantError()
    {
        $response = $this->getJson('/api/v1/tables');

        $response->assertStatus(422);
    }

     /**
     *  Get Tables by Tenant
     *
     * @return void
     */
    public function testGetAllTablesByTenant()
    {
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/tables?token_company={$tenant->uuid}");

        $response->assertStatus(200);
    }

      /**
     * Error Get Table by Tenant
     *
     * @return void
     */
    public function testErrorGetTablesByTenant()
    {
        $table = 'fake_value';
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/tables/{$table}?token_company={$tenant->uuid}");

        $response->assertStatus(404);
    }


     /**
     *  Get Table by Tenant
     *
     * @return void
     */
    public function testGetTablesByTenant()
    {
        $tenant = factory(Tenant::class)->create();
        $table = factory(Table::class)->create();

        
        $response = $this->getJson("/api/v1/tables/{$table->uuid}?token_company={$tenant->uuid}");
        
        $response->assertStatus(200);
    }
}
