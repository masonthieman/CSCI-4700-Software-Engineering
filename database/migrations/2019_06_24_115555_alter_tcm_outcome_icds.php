<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTcmOutcomeIcds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcm_outcome_icds', function (Blueprint $table) {
            $table->string('outcome_icd_10',150)->nullable()->default(null);
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tcm_outcome_icds', function (Blueprint $table) {
            $table->string('outcome_icd_10')->nullable()->default(null);
        });
    }
}
