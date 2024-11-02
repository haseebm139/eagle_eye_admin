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
        Schema::create('cart_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('min_order_value')->nullable();
            $table->decimal('price', 10, 2)->nullable(); // Selling price
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('material')->nullable();
            $table->string('printed_sides')->nullable();
            $table->string('flute_direction')->nullable();
            $table->string('special_instructions')->nullable();
            $table->string('additional_file_notes')->nullable();
            $table->string('additional_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_products');
    }
};
