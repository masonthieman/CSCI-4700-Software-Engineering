<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummaryProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('summary_id');
            $table->string('name', 45)->nullable()->default(Null);
            $table->string('specialty', 45)->nullable()->default(Null);
            $table->string('number', 45)->nullable()->default(Null);
            $table->date('last_office_visit')->nullable()->default(Null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summary_providers');
    }
}
