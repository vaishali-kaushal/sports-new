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
        Schema::create('coach_otps', function (Blueprint $table) {

            $table->id();
            $table->string('secure_id')->unique();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('coach_id');
            $table->integer('otp');
            $table->integer('status')->default(0);
            $table->softDeletes();
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coach_otps');
    }
};
