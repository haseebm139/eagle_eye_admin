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
            $table->string('profile')->nullable()->after('type');
            $table->enum('status', [0,1])->nullable()->default(1)->comment('0 = Block, 1 = Active')->after('profile');
            $table->string('country')->nullable()->after('status');
            $table->string('state')->nullable()->after('country');
            $table->string('city')->nullable()->after('state');
            $table->string('address')->nullable()->after('city');
            $table->date('since')->nullable()->default(now())->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn('users', 'status')) {
                    $table->dropColumn('status');
                }
                if (Schema::hasColumn('users', 'country')) {
                    $table->dropColumn('country');
                }
                if (Schema::hasColumn('users', 'state')) {
                    $table->dropColumn('state');
                }
                if (Schema::hasColumn('users', 'city')) {
                    $table->dropColumn('city');
                }
                if (Schema::hasColumn('users', 'address')) {
                    $table->dropColumn('address');
                }
                if (Schema::hasColumn('users', 'since')) {
                    $table->dropColumn('since');
                }

                if (Schema::hasColumn('users', 'profile')) {
                    $table->dropColumn('profile');
                }
            });

        });
    }
};
