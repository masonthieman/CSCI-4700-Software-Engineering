<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOutcomeMedReconNotCompletedPriorToFaceToFace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcm_forms', function (Blueprint $table) {
            $table->integer('outcome_med_recon_not_completed_prior_to_face_to_face')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tcm_forms', function (Blueprint $table) {
            Schema::dropIfExists('outcome_med_recon_not_completed_prior_to_face_to_face');
        });
    }
}
