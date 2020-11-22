<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedReconDischargeMedicationType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcm_med_recon_discharge_medications', function (Blueprint $table) {
            $table->Integer("med_recon_discharge_medications_type")->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tcm_med_recon_discharge_medications', function (Blueprint $table) {
            $table->dropColumn('med_recon_discharge_medications_type');
        });
    }
}
