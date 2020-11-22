<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummaryMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_medications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('summary_id');
            $table->string('name', 50)->nullable()->default(Null);
            $table->string('strength', 20)->nullable()->default(Null);
            $table->string('frequency', 20)->nullable()->default(Null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summary_medications');
    }
}
