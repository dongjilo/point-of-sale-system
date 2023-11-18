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
        Schema::create('supplier_receives', function (Blueprint $table) {
            $table->id('supplier_receive_id');
            $table->unsignedBigInteger('supplier_order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('supplier_receive_batch');
            $table->integer('supplier_receive_quantity');
            $table->integer('supplier_receive_price');
            $table->integer('supplier_receive_subtotal');
            $table->date('supplier_receive_date');
            $table->date('supplier_receive_expiry');
            $table->foreign('supplier_order_id')->references('supplier_order_id')->on('supplier_orders');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_receives');
    }
};
