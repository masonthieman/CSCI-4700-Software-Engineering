<?php

use App\Models\PatientContactTime;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientContactTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_contact_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            foreach (PatientContactTime::columnNames() as $col) {
                $table->boolean($col)->default(False);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_contact_time');
    }
}
