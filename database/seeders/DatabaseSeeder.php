<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Rule;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Rule::factory()->create([
           
        ]);
        Role::factory()->create([
            'role_name' => 'Admin',
        ]);
        //  User::factory(34)->create();

       
    }
}
