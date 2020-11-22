<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_auths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('manager_id')->nullable()->default(Null); // Indicates the assigned manager
            $table->string("email", 255)->unique();
            $table->string("password", 60);
            $table->boolean("is_admin")->default(False);
            $table->boolean("is_manager")->default(False);
            $table->boolean("is_active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_auths');
    }
}
