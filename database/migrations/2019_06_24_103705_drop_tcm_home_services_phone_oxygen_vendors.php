<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTcmHomeServicesPhoneOxygenVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tcm_home_services_oxygen_vendors', function (Blueprint $table) {
            $table->dropColumn('oxygen_vendor_phone');
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
        Schema::table('tcm_home_services_oxygen_vendors', function (Blueprint $table) {
            $table->string('oxygen_vendor_phone', 15)->nullable()->default(null);
        });
    }
}
