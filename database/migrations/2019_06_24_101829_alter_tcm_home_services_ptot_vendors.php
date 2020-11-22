<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTcmHomeServicesPtotVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
    {
        //
        Schema::table('tcm_home_services_ptot_vendors', function (Blueprint $table) {
            $table->string('ptot_vendor_contacted', 100)->nullable()->default(null);
            $table->string('ptot_vendor_comments', 255)->nullable()->default(null);
            $table->date('ptot_follow_up_date')->nullable()->default(null);
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
        Schema::table('tcm_home_services_ptot_vendors', function (Blueprint $table) {
            $table->dropColumn('ptot_vendor_contacted');
            $table->dropColumn('ptot_vendor_comments');
            $table->dropColumn('ptot_follow_up_date');
        });
    }
}
