<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLabFollowupDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcm_home_services_lab_vendors', function (Blueprint $table) {
            $table->date('lab_vendor_follow_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tcm_home_services_lab_vendors', function (Blueprint $table) {
            $table->drop('lab_vendor_follow_date');
        });
    }
}
