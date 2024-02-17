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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('secure_id')->unique();
            $table->string('nurserie_secure_id');
            $table->string('user_secure_id')->nullable();
            $table->string('coach_name');
            $table->string('father_name');
            $table->string('age');
            $table->string('adhar_number')->nullable();
            $table->string('sports_coach');
            $table->bigInteger('mobile_no');
            $table->string('email');
            $table->string('profile_pic')->nullable();
            $table->string('achievements_with_pics')->nullable();
            $table->integer('email_verified_at')->default(0);
            $table->integer('mobile_verified_at')->default(0);
            $table->integer('final_confirm')->default(0);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
