<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TcmForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcm_forms', function (Blueprint $table) {
            $table->string('face_to_face_notCompleted_reason',150)->nullable()->default(null)->change();
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tcm_forms', function (Blueprint $table) {
            $table->string('face_to_face_notCompleted_reason',150)->nullable()->default(null)->change();
        });   
    }
}
