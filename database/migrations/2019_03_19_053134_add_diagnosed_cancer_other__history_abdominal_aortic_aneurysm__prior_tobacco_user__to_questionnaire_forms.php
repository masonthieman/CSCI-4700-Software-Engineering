<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiagnosedCancerOtherHistoryAbdominalAorticAneurysmPriorTobaccoUserToQuestionnaireForms extends Migration
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
	//		$table->boolean("history_abdominal_aortic_aneurysm")->nullable()->default(Null)->after('history_depression_suicide_relationship');
       //     $table->string("history_abdominal_aortic_aneurysm_relationship", 70)->nullable()->default(Null)->after('history_abdominal_aortic_aneurysm');
           // $table->boolean('diagnosed_cancer_other')->nullable()->default(Null)->after('diagnosed_congestive_heart_failure');
            $table->boolean('prior_tobacco_user')->nullable()->default(Null)->after('tobacco');
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
         //   $table->dropColumn('history_abdominal_aortic_aneurysm');
       //     $table->dropColumn('history_abdominal_aortic_aneurysm_relationship');
           // $table->dropColumn('diagnosed_cancer_other');
            $table->dropColumn('prior_tabacco_user');
        });
    }
}
