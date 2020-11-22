<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcmMedReconDischargeMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcm_med_recon_discharge_medications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tcm_form_id');
            $table->integer('med_recon_discharge_medication_type')->nullable()->default(Null);
            $table->string('med_recon_discharge_medication_drug_name',50)->nullable()->default(Null);
            $table->string('med_recon_discharge_medication_dose',50)->nullable()->default(Null);
            $table->string('med_recon_discharge_medication_frequency',50)->nullable()->default(Null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tcm_med_recon_discharge_medications');
    }
}
