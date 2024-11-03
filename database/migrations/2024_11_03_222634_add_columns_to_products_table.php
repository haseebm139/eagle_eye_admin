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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('min_stock')->nullable()->default(0)->after('stock'); // Quantity in stock
            $table->decimal('discount_value', 10, 2)->default(0.00)->after('is_discount'); // Quantity in stock


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('min_stock');
            $table->dropColumn('discount_value');
        });
    }
};
