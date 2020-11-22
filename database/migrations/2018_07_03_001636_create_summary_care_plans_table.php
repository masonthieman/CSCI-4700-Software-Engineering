<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummaryCarePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_care_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('summary_id');
            $table->integer('care_plan_template_id');
            $table->date('date')->nullable()->default(Null);
            $table->string('icd10', 10)->nullable()->default(Null);
            $table->json('care_plan')->nullable()->default(Null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summary_care_plans');
    }
}
