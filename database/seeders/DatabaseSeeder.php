<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(10)->create();
        Category::factory(10)->create();
        Supplier::factory(10)->create();
        Product::factory(10)->create();
        Inventory::factory(10)->create();

        DB::table('users')->insert([
            'user_name' => 'Admin',
            'user_uname' => 'admin',
            'user_password' => bcrypt('admin'),
            'user_type' => 'admin',
        ]);
    }
}
