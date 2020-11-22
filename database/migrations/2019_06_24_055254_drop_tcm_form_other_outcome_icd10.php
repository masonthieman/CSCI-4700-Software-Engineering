<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTcmFormOtherOutcomeIcd10 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tcm_forms', function (Blueprint $table) {
            $table->dropColumn('readmission_for_new_or_diff_icd10');
            $table->dropColumn('Ed_visit_same_or_similar_icd10');
            $table->dropColumn('Ed_visit_new_or_different_icd10');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('tcm_forms', function (Blueprint $table) {
            $table->string('readmission_for_new_or_diff_icd10', 10)->nullable()->default(null);
            $table->string('ED_visit_same_or_similar_icd10', 10)->nullable()->default(null);
            $table->string('ED_visit_new_or_different_icd10', 10)->nullable()->default(null);
        });
    }
}
