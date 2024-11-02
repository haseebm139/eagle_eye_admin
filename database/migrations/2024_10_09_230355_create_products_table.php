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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Product name
            $table->string('slug')->unique()->nullable();
            $table->string('category')->nullable(); // Product category
            $table->decimal('cost_price', 10, 2)->nullable(); // Cost price
            $table->decimal('sell_price', 10, 2)->nullable(); // Selling price
            $table->integer('stock')->nullable(); // Quantity in stock
            $table->text('short_description')->nullable(); // Short description
            $table->longText('long_description')->nullable(); // Long description
            $table->string('time')->nullable(); // Time
            $table->date('date')->nullable(); // Date
            $table->boolean('is_discount')->default(false)->nullable(); // Discount flag
            $table->boolean('is_discount2')->default(false)->nullable(); // Second discount flag
            $table->boolean('is_expire')->default(false)->nullable(); // Expiry flag
            $table->boolean('is_min_orders')->default(false)->nullable();
            $table->integer('min_order_value')->nullable()->default(1);
            $table->decimal('global_value', 10, 2)->nullable()->default(0.00);
            $table->enum('status', [0,1,2])->nullable()->default(1)->comment('0 = draft, 1 = publish, 2 = unpublish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
