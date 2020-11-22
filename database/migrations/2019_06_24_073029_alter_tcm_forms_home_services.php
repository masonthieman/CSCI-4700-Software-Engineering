<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTcmFormsHomeServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tcm_forms', function (Blueprint $table) {
            $table->dropColumn('hh_contacted');
            $table->dropColumn('hh_name');
            $table->dropColumn('hh_comments');
            $table->dropColumn('hh_follow_up');

            $table->dropColumn('dme_contacted');
            $table->dropColumn('dme_name');
            $table->dropColumn('dme_comments');
            $table->dropColumn('dme_follow_up');

            $table->dropColumn('ptot_contacted');
            $table->dropColumn('ptot_name');
            $table->dropColumn('ptot_comments');
            $table->dropColumn('ptot_follow_up');

            $table->dropColumn('oxygen_contacted');
            $table->dropColumn('oxygen_name');
            $table->dropColumn('oxygen_comments');
            $table->dropColumn('oxygen_follow_up');

            $table->dropColumn('lab_contacted');
            $table->dropColumn('lab_name');
            $table->dropColumn('lab_comments');
            $table->dropColumn('lab_follow_up');

            $table->dropColumn('other_contacted');
            $table->dropColumn('other_name');
            $table->dropColumn('other_comments');
            $table->dropColumn('other_follow_up');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('tcm_forms', function (Blueprint $table) {

            $table->date('hh_contacted')->nullable()->default(null);
            $table->string('hh_name')->nullable()->default(null);
            $table->longtext('hh_comments')->nullable()->default(null);
            $table->date('hh_follow_up')->nullable()->default(null);

            $table->date('dme_contacted')->nullable()->default(null);
            $table->string('dme_name')->nullable()->default(null);
            $table->longtext('dme_comments')->nullable()->default(null);
            $table->date('dme_follow_up')->nullable()->default(null);

            $table->date('ptot_contacted')->nullable()->default(null);
            $table->string('ptot_name')->nullable()->default(null);
            $table->longtext('ptot_comments')->nullable()->default(null);
            $table->date('ptot_follow_up')->nullable()->default(null);

            $table->date('oxygen_contacted')->nullable()->default(null);
            $table->string('oxygen_name')->nullable()->default(null);
            $table->longtext('oxygen_comments')->nullable()->default(null);
            $table->date('oxygen_follow_up')->nullable()->default(null);

            $table->date('lab_contacted')->nullable()->default(null);
            $table->string('lab_name')->nullable()->default(null);
            $table->longtext('lab_comments')->nullable()->default(null);
            $table->date('lab_follow_up')->nullable()->default(null);

            $table->date('other_contacted')->nullable()->default(null);
            $table->string('other_name')->nullable()->default(null);
            $table->longtext('other_comments')->nullable()->default(null);
            $table->date('other_follow_up')->nullable()->default(null);

        });
    }
}
