<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcmHomeServicesPtotVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcm_home_services_ptot_vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tcm_form_id');
            $table->string('ptot_vendor_name', 100)->nullable()->default(Null);
            $table->string('ptot_vendor_phone',15)->nullable()->default(Null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tcm_home_services_ptot_vendors');
    }
}
