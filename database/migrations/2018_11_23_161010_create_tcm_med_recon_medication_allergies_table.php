<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcmMedReconMedicationAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcm_med_recon_medication_allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tcm_form_id');
            $table->string('med_recon_medication_allergy_drug_name')->nullable()->default(null);
            $table->string('med_recon_medication_allergy_reaction')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tcm_med_recon_medication_allergies');
    }
}
