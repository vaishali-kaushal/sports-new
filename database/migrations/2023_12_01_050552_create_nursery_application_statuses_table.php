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
        Schema::create('nursery_application_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('nursery_id');
            $table->integer('district_id');
            $table->integer('approved_reject_by_dso')->default(0)->comment("if 1 it means report submit by dso if 2 it means reject");;
            $table->integer('approved_by_admin_or_reject_by_admin')->default(0)->comment("if status is 1 it means approved and 2 means reject by admin");
            // $table->integer('reject_by_admin')->default(0);
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nursery_application_statuses');
    }
};
