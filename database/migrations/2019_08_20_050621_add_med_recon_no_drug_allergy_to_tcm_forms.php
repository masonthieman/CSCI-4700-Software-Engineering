<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMedReconNoDrugAllergyToTcmForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcm_forms', function (Blueprint $table) {
            $table->boolean('med_recon_no_drug_allergy')->nullable()->default(Null)->after('med_recon_phy_notification_completed_note');
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
            $table->dropColumn('med_recon_no_drug_allergy');
        });
    }
}
