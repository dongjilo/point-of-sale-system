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

        Schema::table('users', function (Blueprint $table)
        {
            $table->foreign('role_id')->references('role_id')->on('roles');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('category_id')->on('categories');
        });

        Schema::table('inventories', function (Blueprint $table) {
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers');
            $table->foreign('user_id')->references('user_id')->on('users');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('product_id')->references('product_id')->on('products');
        });

        Schema::table('billings', function (Blueprint $table) {
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('user_id')->references('user_id')->on('users');
        });

        Schema::table('bestseller', function (Blueprint $table) {
            $table->foreign('product_id')->references('product_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
