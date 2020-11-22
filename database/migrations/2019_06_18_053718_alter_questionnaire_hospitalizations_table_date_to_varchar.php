<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterQuestionnaireHospitalizationsTableDateToVarchar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_hospitalizations', function (Blueprint $table) {
            $table->string('date', 10)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire_hospitalizations', function (Blueprint $table) {
            $table->date('date')->nullable()->default(NULL);
        });
    }
}
