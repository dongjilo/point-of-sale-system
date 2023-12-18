<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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

        for ($i = 1; $i <= 10; $i++) {
            DB::table('orders')->insert([
                'user_id' => $i,
                'order_date' => Carbon::now()->subDays(rand(1, 30)),
            ]);

            DB::table('order_items')->insert([
                'order_id' => $i,
                'product_id' => rand(1, 10),
                'order_item_quantity' => rand(1, 5),
                'order_item_subtotal' => rand(100, 500),
            ]);

            $orderDate = Carbon::now()->subDays(rand(1, 365));

            DB::table('billings')->insert([
                'order_id' => $i,
                'user_id' => $i,
                'billing_payment_method' => 'Cash',
                'billing_total_amount' => rand(5000, 10000),
                'billing_amount_tendered' => rand(5000, 10000),
                'billing_date' => $orderDate,
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
            ]);
        }
    }
}
