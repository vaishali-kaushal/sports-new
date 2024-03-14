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
            $table->string('nursery_id');
            $table->string('user_id')->nullable();
            $table->string('coach_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->date('dob');
            $table->integer('coach_qualification');
            $table->biginteger('mobile_number');
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->integer('pin_code')->nullable();
            $table->biginteger('bank_account_number');
            $table->string('bank_name');
            $table->text('bank_address');
            $table->string('ifsc_code');
            $table->text('profile_pic')->nullable();
            $table->text('id_proof')->nullable();
            $table->text('bank_statment')->nullable();
            $table->text('qualification_doc')->nullable();
            $table->integer('active')->default(1);
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
