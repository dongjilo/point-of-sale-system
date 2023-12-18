<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*
         * TODO: Finalize the columns for the users table.
         */

        Schema::create('roles' , function (Blueprint $table) {
            $table->id('role_id');
            $table->string('role_name');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_name');
            $table->string('user_uname')->unique();
            $table->string('user_password');
            $table->unsignedBigInteger('role_id')->default(2);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('supplier_id');
            $table->string('supplier_name');
            $table->string('supplier_phone')->unique();
            $table->string('supplier_email')->unique();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('category_name');
            $table->string('category_desc')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name');
            $table->string('product_code')->unique();
            $table->decimal('product_price', 8, 2);
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        });

        Schema::create('inventories', function (Blueprint $table) {
            $table->id('inventory_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('inventory_quantity');
            $table->date('inventory_expiry');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('user_id');
            $table->date('order_date');
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('order_item_quantity');
            $table->decimal('order_item_subtotal', 8, 2);
            $table->timestamps();
        });

        Schema::create('billings', function (Blueprint $table) {
            $table->id('billing_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->string('billing_payment_method');
            $table->decimal('billing_total_amount', 8, 2);
            $table->decimal('billing_amount_tendered', 8, 2);
            $table->date('billing_date');
            $table->timestamps();
        });

        Schema::create('bestseller', function (Blueprint $table) {
            $table->id('bestseller_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger ('bestseller_quantity_sold');
            $table->decimal('bestseller_total_sales', 8, 2);
            $table->unsignedInteger('bestseller_month');
            $table->unsignedInteger('bestseller_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bestseller');
        Schema::dropIfExists('billings');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('inventories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }

};
