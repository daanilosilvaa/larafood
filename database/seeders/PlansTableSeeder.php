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
            'name' => 'Businers',
            'url' => 'businers',
            'price' => 39.90,
            'description' => 'Plano Businers',

        ]);
        Plan::create([
            'name' => 'Free',
            'url' => 'free',
            'price' => 0,
            'description' => 'Plano Free',

        ]);
        Plan::create([
            'name' => 'Premium',
            'url' => 'premium',
            'price' => 29.90,
            'description' => 'Plano Premium',

        ]);
    }
}
