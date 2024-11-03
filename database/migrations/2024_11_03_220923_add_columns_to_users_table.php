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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('is_billing_address', [0,1])->nullable()->default(0)->comment('0 = false, 1 = true')->after('address');
            $table->string('billing_country')->nullable()->after('is_billing_address') ;
            $table->string('billing_state')->nullable()->after('billing_country') ;
            $table->string('billing_city')->nullable()->after('billing_state') ;
            $table->string('billing_address')->nullable()->after('billing_city') ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_billing_address');
            $table->dropColumn('billing_country');
            $table->dropColumn('billing_state');
            $table->dropColumn('billing_city');
            $table->dropColumn('billing_address');
        });
    }
};
