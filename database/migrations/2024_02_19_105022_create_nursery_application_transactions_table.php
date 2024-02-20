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
        Schema::create('nursery_application_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('nursery_id');
            $table->date('transaction_date');
            $table->enum('status', ['PENDING', 'DSO_RECOMMEND', 'DSO_NOTRECOMMEND', 'HQ_APPROVE','HQ_REJECT','HQ_OBJECTION'])->default('PENDING');
            $table->string('action_by');
            $table->text('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nursery_application_transactions');
    }
};
