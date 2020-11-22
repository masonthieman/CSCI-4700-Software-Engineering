<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTcmHomeServicesLabVendors extends Migration
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
            $table->string('lab_vendor_contacted', 100)->nullable()->default(null);
            $table->string('lab_vendor_comments', 255)->nullable()->default(null);
            $table->date('lab_follow_up_date')->nullable()->default(null);
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
            $table->dropColumn('lab_vendor_contacted');
            $table->dropColumn('lab_vendor_comments');
            $table->dropColumn('lab_follow_up_date');
        });
    }
}
