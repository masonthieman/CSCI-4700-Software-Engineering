<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTcmHomeServicesOxygenVendors extends Migration
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
            $table->string('oxygen_vendor_contacted', 100)->nullable()->default(null);
            $table->string('oxygen_vendor_comments', 255)->nullable()->default(null);
            $table->date('oxygen_follow_up_date')->nullable()->default(null);
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
            $table->dropColumn('oxygen_vendor_contacted');
            $table->dropColumn('oxygen_vendor_comments');
            $table->dropColumn('oxygen_follow_up_date');
        });
    }
}
