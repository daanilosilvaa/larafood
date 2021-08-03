<?php

namespace Database\Seeders;

use App\Models\{
    Plan,
    Tenant
};
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '36146332000126',
            'name' => 'Danilo Silva da Costa',
            'url' => 'danilosilvadacosta',
            'email' => 'daanilo-silvaa@hotmail.com',

        ]);
    }
}
