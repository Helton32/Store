<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Products;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@test.com',
            'role' => 'admin',
        ]);
    
        User::factory(10)->create();
        Category::factory(10)->create();
        Products::factory(100)->create();
        Customer::factory(15)->create();
    }
       
}
