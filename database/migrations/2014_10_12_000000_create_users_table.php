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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->string('type')->nullable()->default('user');
            $table->string('role_id')->nullable()->default('user');
            $table->string('profile')->default('assets/profile.png')->nullable() ;
            $table->enum('status', [0,1])->nullable()->default(1)->comment('0 = Block, 1 = Active');
            $table->string('country')->nullable() ;
            $table->string('state')->nullable() ;
            $table->string('city')->nullable() ;
            $table->string('address')->nullable() ;
            $table->date('since')->nullable()->default(now()) ;

            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('apple_id')->nullable();
            $table->string('job_title')->nullable();
            $table->string('employee_id')->nullable();
            $table->enum('job_type', ['fulltime', 'parttime'])->nullable()->default('fulltime');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
