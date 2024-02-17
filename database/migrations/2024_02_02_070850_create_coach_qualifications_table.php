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
        Schema::create('coach_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('qual_cat')->nullable();
            $table->integer('coach_fee')->nullable();
            $table->integer('is_active')->default(1)->comment("1:Active, 0:Inactive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coach_qualifications');
    }
};
