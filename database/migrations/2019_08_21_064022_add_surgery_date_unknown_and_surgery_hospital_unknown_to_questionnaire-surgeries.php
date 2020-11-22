<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSurgeryDateUnknownAndSurgeryHospitalUnknownToQuestionnaireSurgeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_surgeries', function (Blueprint $table) {
            $table->boolean('surgery_date_unknown')->nullable()->default(Null)->after('date');
            $table->boolean('surgery_hospital_unknown')->nullable()->default(Null)->after('hospital');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire_surgeries', function (Blueprint $table) {
            $table->dropColumn('surgery_date_unknown');
            $table->dropColumn('surgery_hospital_unknown');
        });
    }
}
