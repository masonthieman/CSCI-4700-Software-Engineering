<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('practice_id');
            $table->integer('practice_physician_id');
            $table->date('date');
            $table->string('emr', 15)->unique();
            $table->string('fname', 35);
            $table->string('mname', 35)->nullable()->default(Null);
            $table->string('lname', 35);
            $table->boolean('gender');
            $table->date('dob');
            $table->string('addr1', 70);
            $table->string('addr2', 70)->nullable()->default(Null);
            $table->string('city', 35);
            $table->string('state', 35);
            $table->string('zip', 10);
            $table->string('ethnicity1', 45);
            $table->string('ethnicity2', 45)->nullable()->default(Null);
            $table->string('phone_primary', 14);
            $table->string('phone_secondary', 14)->nullable()->default(Null);
            $table->string('email', 255)->unique();
            $table->string('other_contact_name', 70)->nullable()->default(Null);
            $table->string('other_contact_relationship', 70)->nullable()->default(Null);
            $table->string('other_contact_phone', 14)->nullable()->default(Null);
            $table->string('other_contact_email', 255)->nullable()->default(Null);
            $table->integer('preferred_contact');
            $table->string('insurance_primary', 255)->nullable()->default(Null);
            $table->string('insurance_primary_idnum', 50)->nullable()->default(Null);
            $table->string('insurance_secondary', 255)->nullable()->default(Null);
            $table->string('insurance_secondary_idnum', 50)->nullable()->default(Null);
            $table->string('marital_status', 45);
            $table->string('education', 45);
            $table->integer('occupation_status');
            $table->string('occupation_description', 255)->nullable()->default(Null);
            $table->boolean('poa')->default(False);
            $table->string('poa_name', 70)->nullable()->default(Null);
            $table->string('poa_relationship', 70)->nullable()->default(Null);
            $table->string('poa_phone', 70)->nullable()->default(Null);
            $table->string('poa_email', 70)->nullable()->default(Null);
            $table->boolean('enroll_awv')->default(False);
            $table->boolean('enroll_iccm')->default(False);
            $table->boolean('enroll_other')->default(False);
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
        Schema::dropIfExists('patients');
    }
}
