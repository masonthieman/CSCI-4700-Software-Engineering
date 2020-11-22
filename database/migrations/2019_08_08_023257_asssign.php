<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asssign extends Migration
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
            $table->Integer("assigned_to");
            $table->Integer("reassigned_to");
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
            $table->dropColumn('assigned_to');
            $table->dropColumn('reassigned_to');
        });
    }
}
