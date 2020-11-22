<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropEmrUniqueConstrain extends Migration
{
    /**
     * Run the migrations.
     * To Delete Unique Constraint of emr in patients table
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function(Blueprint $table)
        {
            $table->dropUnique(['emr']);
            $table->dropUnique(['email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function(Blueprint $table)
        {
            //Put the index back when the migration is rolled back
            $table->unique(['emr']);
            $table->unique(['email']);
        });
    }
}
