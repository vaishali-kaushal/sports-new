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
        Schema::create('application_remarks', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('application_status_id');
            $table->enum('site_visit',['yes', 'no']);
            $table->enum('recommend_status',['yes', 'no']) ->comment('yes: Recommended, no: Not Recommended');
            $table->longText('remarks')->nullable();
            $table->string('files')->nullable();
            $table->string('grade')->nullable();
            $table->string('inspection_report')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_remarks');
    }
};
