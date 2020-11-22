<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireFamilyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_family_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionnaire_form_id');
            $table->string('condition_name')->nullable()->default(Null);
            $table->string('relationship')->nullable()->default(Null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaire_family_histories');
    }
}
