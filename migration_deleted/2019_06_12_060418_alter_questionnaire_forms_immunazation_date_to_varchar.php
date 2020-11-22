<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterQuestionnaireFormsImmunazationDateToVarchar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_forms', function (Blueprint $table) {
            $table->string('immunization_tetanus_date', 10)->nullable()->change();
            $table->string('immunization_hepatitis_date', 10)->nullable()->change();
            $table->string('immunization_influenza_date', 10)->nullable()->change();
            $table->string('immunization_pneumonia_date', 10)->nullable()->change();
            $table->string('immunization_varicella_date', 10)->nullable()->change();
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
            $table->date('immunization_tetanus_date')->nullable()->default(NULL);
            $table->date('immunization_hepatitis_date')->nullable()->default(NULL);
            $table->date('immunization_influenza_date')->nullable()->default(NULL);
            $table->date('immunization_pneumonia_date')->nullable()->default(NULL);
            $table->date('immunization_varicella_date')->nullable()->default(NULL);
        });
    }
}
