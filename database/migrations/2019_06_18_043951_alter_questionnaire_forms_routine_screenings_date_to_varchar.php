<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterQuestionnaireFormsRoutineScreeningsDateToVarchar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_forms', function (Blueprint $table) {
            $table->string('routine_screening_mammography_date', 10)->nullable()->change();
            $table->string('routine_screening_std_date', 10)->nullable()->change();
            $table->string('routine_screening_prostate_date', 10)->nullable()->change();
            $table->string('routine_screening_bone_density_date', 10)->nullable()->change();
            $table->string('routine_screening_ultrasound_date', 10)->nullable()->change();
            $table->string('routine_screening_cholesterol_date', 10)->nullable()->change();
            $table->string('routine_screening_triglyceride_date', 10)->nullable()->change();
            $table->string('routine_screening_hdl_date', 10)->nullable()->change();
            $table->string('routine_screening_colonoscopy_date', 10)->nullable()->change();
            $table->string('routine_screening_pap_date', 10)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire_forms', function (Blueprint $table) {
            $table->date('routine_screening_mammography_date')->nullable()->default(NULL);
            $table->date('routine_screening_std_date')->nullable()->default(NULL);
            $table->date('routine_screening_prostate_date')->nullable()->default(NULL);
            $table->date('routine_screening_bone_density_date')->nullable()->default(NULL);
            $table->date('routine_screening_ultrasound_date')->nullable()->default(NULL);
            $table->date('routine_screening_cholesterol_date')->nullable()->default(NULL);
            $table->date('routine_screening_triglyceride_date')->nullable()->default(NULL);
            $table->date('routine_screening_hdl_date')->nullable()->default(NULL);
            $table->date('routine_screening_colonoscopy_date')->nullable()->default(NULL);
            $table->date('routine_screening_pap_date')->nullable()->default(NULL);
        });
    }
}
