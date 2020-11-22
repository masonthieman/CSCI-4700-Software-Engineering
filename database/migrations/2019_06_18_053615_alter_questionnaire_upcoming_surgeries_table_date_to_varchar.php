<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterQuestionnaireUpcomingSurgeriesTableDateToVarchar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_upcoming_surgeries', function (Blueprint $table) {
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
        Schema::table('questionnaire_upcoming_surgeries', function (Blueprint $table) {
            $table->date('date')->nullable()->default(NULL);
        });
    }
}
