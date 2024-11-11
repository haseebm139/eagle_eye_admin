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


            $table->boolean('is_flute_direction')->default(false)->nullable()->after('min_stock');
            $table->boolean('is_height')->default(false)->nullable()->after('is_flute_direction');
            $table->boolean('is_material')->default(false)->nullable()->after('is_height');
            $table->boolean('is_printed_sides')->default(false)->nullable()->after('is_material');
            $table->boolean('is_width')->default(false)->nullable()->after('is_printed_sides');
            $table->boolean('is_lamination')->default(false)->nullable()->after('is_width');
            $table->decimal('lamination_value', 10, 2)->nullable()->after('is_lamination'); // Selling price
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('is_flute_direction');
            $table->dropColumn('is_height');
            $table->dropColumn('is_material');
            $table->dropColumn('is_printed_sides');
            $table->dropColumn('is_width');
            $table->dropColumn('is_lamination');
            $table->dropColumn('lamination_value');
        });
    }
};
