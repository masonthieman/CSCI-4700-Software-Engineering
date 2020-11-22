<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCaffeineSectionFieldsToQuestionnaireForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_forms', function (Blueprint $table) {
            //
			$table->boolean("caffeine_none")->nullable()->default(Null)->after('sleep_aid');
            $table->boolean("caffeine_coffee")->nullable()->default(Null)->after('caffeine_none');
            $table->integer('caffeine_coffee_cups_per_day')->nullable()->default(Null)->after('caffeine_coffee');
            $table->boolean('caffeine_tea')->nullable()->default(Null)->after('caffeine_coffee_cups_per_day');
			$table->integer("caffeine_tea_cups_per_day")->nullable()->default(Null)->after('caffeine_tea');
            $table->boolean('caffeine_cola')->nullable()->default(Null)->after('caffeine_tea_cups_per_day');
            $table->integer('caffeine_cola_cups_per_day')->nullable()->default(Null)->after('caffeine_cola');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire_forms', function (Blueprint $table) {
            $table->dropColumn('caffeine_none');
            $table->dropColumn('caffeine_coffee');
            $table->dropColumn('caffeine_coffee_cups_per_day');
            $table->dropColumn('caffeine_tea');
            $table->dropColumn('caffeine_tea_cups_per_day');
            $table->dropColumn('caffeine_cola');
            $table->dropColumn('caffeine_cola_cups_per_day');
        });
    }
}
