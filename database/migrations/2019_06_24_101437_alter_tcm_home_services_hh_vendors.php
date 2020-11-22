<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTcmHomeServicesHhVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tcm_home_services_hh_vendors', function (Blueprint $table) {
            $table->string('hh_vendor_contacted', 100)->nullable()->default(null);
            $table->string('hh_vendor_comments', 255)->nullable()->default(null);
            $table->date('hh_follow_up_date')->nullable()->default(null);
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
        Schema::table('tcm_home_services_hh_vendors', function (Blueprint $table) {
            $table->dropColumn('hh_vendor_contacted');
            $table->dropColumn('hh_vendor_comments');
            $table->dropColumn('hh_follow_up_date');
        });
    }
}
