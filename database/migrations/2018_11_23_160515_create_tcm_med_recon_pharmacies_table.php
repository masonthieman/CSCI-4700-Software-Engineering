<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcmMedReconPharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcm_med_recon_pharmacies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tcm_form_id');
            $table->string('med_recon_pharmacy_name')->nullable()->default(Null);
            $table->string('med_recon_pharmacy_phone',15)->nullable()->default(Null);
            $table->string('med_recon_pharmacy_fax',15)->nullable()->default(Null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tcm_med_recon_pharmacies');
    }
}
