<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfficeVisitDateUnknownToQuestionnaireProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_providers', function (Blueprint $table) {
            $table->boolean('office_visit_date_unknown')->nullable()->default(Null)->after('last_office_visit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire_providers', function (Blueprint $table) {
            $table->dropColumn('office_visit_date_unknown');
        });
    }
}
