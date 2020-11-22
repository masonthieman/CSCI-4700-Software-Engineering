<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcmPatientContactAddlAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcm_patient_contact_addl_attempts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tcm_form_id');
            $table->boolean('addl_contact_attempt')->nullable()->default(null);
            $table->string('addl_contact_attempt_method')->nullable()->default(null);
            $table->integer('addl_contact_attempt_successful')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tcm_patient_contact_addl_attempts');
    }
}
