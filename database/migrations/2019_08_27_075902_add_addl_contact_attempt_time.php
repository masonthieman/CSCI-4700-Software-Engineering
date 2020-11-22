<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddlContactAttemptTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcm_patient_contact_addl_attempts', function (Blueprint $table) {
            $table->Time("addl_contact_attempt_time");
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
            $table->dropColumn('addl_contact_attempt_time');
        });
    }
}
