<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTcmHomeServicesDmeVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
    {
        //
        Schema::table('tcm_home_services_dme_vendors', function (Blueprint $table) {
            $table->string('dme_vendor_contacted', 100)->nullable()->default(null);
            $table->string('dme_vendor_comments', 255)->nullable()->default(null);
            $table->date('dme_follow_up_date')->nullable()->default(null);
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
        Schema::table('tcm_home_services_dme_vendors', function (Blueprint $table) {
            $table->dropColumn('dme_vendor_contacted');
            $table->dropColumn('dme_vendor_comments');
            $table->dropColumn('dme_follow_up_date');
        });
    }
}