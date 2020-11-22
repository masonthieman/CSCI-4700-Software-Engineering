<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcmMedReconMedicationChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcm_med_recon_medication_changes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tcm_form_id');
            $table->integer('med_recon_medication_changes_type')->nullable()->default(Null);
            $table->string('med_recon_medication_changes_drug_name',100)->nullable()->default(Null);
            $table->string('med_recon_medication_changes_dose',50)->nullable()->default(Null);
            $table->string('med_recon_medication_changes_frequency', 100)->nullable()->default(Null);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tcm_med_recon_medication_changes');
    }
}
