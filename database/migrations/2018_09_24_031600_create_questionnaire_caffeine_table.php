<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireCaffeineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_caffeine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionnaire_form_id');
            $table->boolean('none')->nullable()->default(Null);
            $table->boolean('drinks_coffee')->nullable()->default(Null);
            $table->boolean('drinks_tea')->nullable()->default(Null);
            $table->boolean('drinks_cola')->nullable()->default(Null);
            $table->integer('coffee_cups_per_day')->nullable()->default(Null);
            $table->integer('tea_cups_per_day')->nullable()->default(Null);
            $table->integer('cola_cups_per_day')->nullable()->default(Null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaire_caffeine');
    }
}
