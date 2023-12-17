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
        DB::table('roles')->insert([
            'role_name' => 'admin',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'cashier',
        ]);

        User::factory(10)->create();
        Category::factory(10)->create();
        Supplier::factory(10)->create();
        Product::factory(10)->create();
        Inventory::factory(10)->create();

        DB::table('users')->insert([
            'user_name' => 'Admin',
            'user_uname' => 'admin',
            'user_password' => bcrypt('admin'),
            'role_id' => '1',
        ]);

        DB::table('users')->insert([
            'user_name' => 'Cashier',
            'user_uname' => 'cashier',
            'user_password' => bcrypt('123'),
            'role_id' => '2',
        ]);
    }
}
