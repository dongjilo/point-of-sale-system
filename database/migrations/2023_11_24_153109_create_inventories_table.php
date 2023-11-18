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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id('inventory_id');
            $table->unsignedBigInteger('supplier_receive_id');
            $table->unsignedBigInteger('product_id');
            $table->string('inventory_location');
            $table->string('inventory_shelf');
            $table->string('inventory_status');
            $table->foreign('supplier_receive_id')->references('supplier_receive_id')->on('supplier_receives');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
