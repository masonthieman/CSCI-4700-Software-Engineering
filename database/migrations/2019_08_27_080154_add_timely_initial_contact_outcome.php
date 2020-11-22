<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimelyInitialContactOutcome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcm_patient_contact_addl_attempts', function (Blueprint $table) {
            $table->Integer("addl_timely_initial_contact_outcome");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tcm_patient_contact_addl_attempts', function (Blueprint $table) {
            $table->Integer('addl_timely_initial_contact_outcome');
        });
    }
}
