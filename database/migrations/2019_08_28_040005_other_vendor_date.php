<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OtherVendorDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcm_home_services_other_vendors', function (Blueprint $table) {
            $table->date('other_vendor_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tcm_home_services_other_vendors', function (Blueprint $table) {
            $table->drop('other_vendor_date');
        });
    }
}
