<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OtherContactNameRelationshipPhoneEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcm_forms', function (Blueprint $table) {
            $table->string("other_contact_name",50);
            $table->string("other_contact_relationship",50);
            $table->string("other_contact_phone",50);
            $table->string("other_contact_email",50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfexists('tcm_forms');
        // Schema::table('tcm_forms', function (Blueprint $table) {
        //     $table->dropColumn('other_contact_name');
        //     $table->dropColumn('other_contact_relationship');
        //     $table->dropColumn('other_contact_phone');
        //     $table->dropColumn('other_contact_email');
        // });
    }
}
