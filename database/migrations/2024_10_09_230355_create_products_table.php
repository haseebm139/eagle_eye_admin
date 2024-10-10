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
            $table->string('name'); // Product name
            $table->string('category'); // Product category
            $table->decimal('cost_price', 10, 2); // Cost price
            $table->decimal('sell_price', 10, 2); // Selling price
            $table->integer('stock'); // Quantity in stock
            $table->text('short_description')->nullable(); // Short description
            $table->longText('long_description'); // Long description
            $table->string('time'); // Time
            $table->date('date'); // Date
            $table->boolean('is_discount')->default(false); // Discount flag
            $table->boolean('is_discount2')->default(false); // Second discount flag
            $table->boolean('is_expire')->default(false); // Expiry flag
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
