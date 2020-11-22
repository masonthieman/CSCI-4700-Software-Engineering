<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTcmHomeServicesPhoneLabVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tcm_home_services_lab_vendors', function (Blueprint $table) {
            $table->dropColumn('lab_vendor_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('tcm_home_services_lab_vendors', function (Blueprint $table) {
            $table->string('lab_vendor_phone', 15)->nullable()->default(null);
        });
    }
}
