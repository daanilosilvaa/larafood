<?php

namespace Database\Seeders;

use App\Models\{
    Tenant,
    User
};
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

       $tenant->users()->create([
            'name' =>'Danilo Silva',
            'email'=> 'daanilo-silvaa@hotmail.com',
            'password'=> bcrypt('123456'),
        ]);
    }
}
