<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientContactAddlAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_contact_addl_attempts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tcm_form_id');
            $table->boolean('addl_contact_attempt')->nullable()->default(Null);
            $table->boolean('addl_contact_attempt_date')->nullable()->default(Null);
            $table->time('addl_contact_attempt_time')->nullable()->default(Null);
            $table->integer('addl_contact_attempt_method')->nullable()->default(Null);
            $table->integer('addl_contact_attempt_successful')->nullable()->default(Null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_contact_addl_attempts');
    }
}
