<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Básico',
            'url' => 'basico',
            'price' => 29.90,
            'description' => 'Plano Básico',

        ]);
        Plan::create([
            'name' => 'Premium',
            'url' => 'premium',
            'price' => 39.90,
            'description' => 'Plano Premium',

        ]);
        Plan::create([
            'name' => 'Businers',
            'url' => 'businers',
            'price' => 69.90,
            'description' => 'Plano Businers',

        ]);

    }
}
