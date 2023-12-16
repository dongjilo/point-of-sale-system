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

        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_name');
            $table->string('user_uname')->unique();
            $table->string('user_password');
            $table->string('user_type');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('supplier_id');
            $table->string('supplier_name');
            $table->string('supplier_phone');
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
            $table->string('product_code');
            $table->integer('product_price');
            $table->integer('product_quantity');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::create('supplier_orders', function (Blueprint $table) {
            $table->id('supplier_order_id');
            $table->date('supplier_order_date');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::create('supplier_order_items', function (Blueprint $table) {
            $table->id('supplier_order_item_id');
            $table->unsignedBigInteger('supplier_order_id');
            $table->unsignedBigInteger('product_id');
            $table->double('supplier_order_price');
            $table->integer('supplier_order_quantity');
            $table->double('supplier_order_subtotal');
            $table->unsignedBigInteger('supplier_id');
            $table->timestamps();
        });

        Schema::create('supplier_receives', function (Blueprint $table) {
            $table->id('supplier_receive_id');
            $table->unsignedBigInteger('supplier_order_id')->nullable(true);
            $table->date('supplier_receive_date');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::create('supplier_receive_items', function (Blueprint $table) {
            $table->id('supplier_receive_item_id');
            $table->unsignedBigInteger('supplier_receive_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('supplier_receive_batch');
            $table->double('supplier_receive_price');
            $table->integer('supplier_receive_quantity');
            $table->double('supplier_receive_subtotal');
            $table->date('supplier_receive_expiry');
            $table->unsignedBigInteger('supplier_id');
            $table->timestamps();
        });

        Schema::create('inventories', function (Blueprint $table) {
            $table->id('inventory_id');
            $table->unsignedBigInteger('supplier_receive_id');
            $table->unsignedBigInteger('product_id');
            $table->string('inventory_location');
            $table->string('inventory_shelf');
            $table->string('inventory_status');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('order_id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->date('order_date');
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id');
            $table->string('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('inventory_id');
            $table->integer('order_item_quantity');
            $table->integer('order_item_subtotal');
            $table->timestamps();
        });

        Schema::create('billings', function (Blueprint $table) {
            $table->id('billing_id');
            $table->string('order_id');
            $table->unsignedBigInteger('user_id');
            $table->string('billing_payment_method');
            $table->string('billing_bank_name')->nullable();
            $table->string('billing_bank_account')->nullable();
            $table->integer('billing_total_amount');
            $table->integer('billing_amount_tendered');
            $table->date('billing_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('inventories');
        Schema::dropIfExists('supplier_receives');
        Schema::dropIfExists('supplier_orders');
        Schema::dropIfExists('billings');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
        Schema::dropIfExists('users');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('supplier_order_items');
        Schema::dropIfExists('supplier_receive_items');
        Schema::dropIfExists('inventories');
        Schema::dropIfExists('order_items');
    }

};
