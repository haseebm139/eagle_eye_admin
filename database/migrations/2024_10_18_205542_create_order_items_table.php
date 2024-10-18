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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('name', 100)->nullable();
            $table->string('image', 100)->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('height', 100)->nullable();
            $table->string('width', 100)->nullable();
            $table->string('material', 100)->nullable();
            $table->string('printed_sides', 100)->nullable();
            $table->string('flute_direction', 100)->nullable();
            $table->string('special_instructions', 100)->nullable();
            $table->string('additional_file_notes', 100)->nullable();
            $table->string('additional_file', 100)->nullable();
            // 'height' => $request->height,
            //     'width' => $request->width,
            //     'material' => $request->material,
            //     'printed_sides' => $request->printed_sides,
            //     'flute_direction' => $request->flute_direction,
            //     'special_instructions' => $request->special_instructions,
            //     'additional_file_notes' => $request->additional_file_notes,
            //     'additional_file' => $additional_file, // Use the stored file path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
