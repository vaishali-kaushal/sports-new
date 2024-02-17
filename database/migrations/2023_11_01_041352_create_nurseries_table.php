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
        Schema::create('nurseries', function (Blueprint $table) {
            $table->id();
            $table->string('secure_id')->unique();
            $table->string('application_number')->unique();
            $table->string('cat_of_nursery')->nullable();
            $table->string('type_of_nursery')->nullable();
            $table->string('reg_no_running_nursery')->nullable();
            $table->string('name_of_nursery')->nullable();
            $table->text('address')->nullable();
            $table->string('pan_private')->nullable();
            $table->string('head_pricipal')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('bank_ac')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_ifc_code')->nullable();
            $table->string('game_disp')->nullable();
            $table->string('playground_hall_court_available')->nullable();
            $table->string('equipment_related_to_selected_games_available')->nullable();
            $table->string('whether_nursery_will_provide_sports_kits_to_selected_players')->nullable();
            $table->string('whether_nursery_will_provide_fee_concession_to_selected_players')->nullable();
            $table->string('percentage_fee')->nullable();
            $table->string('whether_qualified_coach_is_available_for_the_concerned_game')->nullable();
            $table->string('boys')->nullable();
            $table->string('girls')->nullable();
            $table->string('district_id')->nullable();
            $table->string('game_id')->nullable();
            $table->string('grade')->nullable();
            $table->string('remarks')->nullable();
            $table->json('pics')->nullable();
            // $table->string('report')->default(0);
            $table->string('status')->default(0);
            $table->integer('final_status')->default(0);
            $table->integer('pin_code')->nullable();
            $table->integer('nursery_running')->nullable()->comment('1:yes, 2:no');
            $table->string('game_previous_id')->nullable();
            $table->string('game_descipline_previous')->nullable();
            // $table->integer('coach_available')->nullable()->comment('1:yes, 2:no');
            $table->string('coach_name')->nullable();
            $table->string('coach_qualification')->nullable();
            $table->string('any_specific_achievements_of_the_institute_during_last')->nullable();
            $table->string('year_allotment')->nullable();
            $table->string('already_running_nursery')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurseries');
    }
};
