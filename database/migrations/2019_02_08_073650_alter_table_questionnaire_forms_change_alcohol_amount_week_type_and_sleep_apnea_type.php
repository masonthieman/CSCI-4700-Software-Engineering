<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableQuestionnaireFormsChangeAlcoholAmountWeekTypeAndSleepApneaType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_forms', function (Blueprint $table) {
            $table->string('alcohol_amount_week', 30)->nullable()->change();
            $table->boolean('sleep_apnea')->nullable()->change();
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
            $table->int('alcohol_amount_week')->nullable()->change();
            $table->char('sleep_apnea', 3)->nullable()->default(Null)->change();
        });
    }
}
