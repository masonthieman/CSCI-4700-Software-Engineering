<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionnaire_form_id');
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
        Schema::dropIfExists('questionnaire_providers');
    }
}
