<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('practice_physician_id');
            $table->boolean('is_initial');
            $table->integer('patient_id');
            $table->string('emr', 10)->nullable()->default(Null);
            $table->integer('practice_id')->nullable()->default(Null);
            $table->string('fname', 35)->nullable()->default(Null);
            $table->string('mname', 35)->nullable()->default(Null);
            $table->string('lname', 35)->nullable()->default(Null);
            $table->boolean('gender')->nullable()->default(Null);
            $table->date('dob')->nullable()->default(Null);
            $table->string('addr1', 70)->nullable()->default(Null);
            $table->string('addr2', 70)->nullable()->default(Null);
            $table->string('city', 35)->nullable()->default(Null);
            $table->string('state', 35)->nullable()->default(Null);
            $table->string('zip', 10)->nullable()->default(Null);
            $table->string('ethnicity1', 45)->nullable()->default(Null);
            $table->string('ethnicity2', 45)->nullable()->default(Null);
            $table->string('phone_primary', 14)->nullable()->default(Null);
            $table->string('phone_secondary', 14)->nullable()->default(Null);
            $table->string('email', 255)->nullable()->default(Null);
            $table->string('other_contact_name', 70)->nullable()->default(Null);
            $table->string('other_contact_relationship', 70)->nullable()->default(Null);
            $table->string('other_contact_phone', 14)->nullable()->default(Null);
            $table->string('other_contact_email', 255)->nullable()->default(Null);
            $table->integer('preferred_contact')->nullable()->default(Null);
            $table->string('insurance_primary', 255)->nullable()->default(Null);
            $table->string('insurance_primary_idnum', 50)->nullable()->default(Null);
            $table->string('insurance_secondary', 255)->nullable()->default(Null);
            $table->string('insurance_secondary_idnum', 50)->nullable()->default(Null);
            $table->string('marital_status', 45)->nullable()->default(Null);
            $table->string('education', 45)->nullable()->default(Null);
            $table->integer('occupation_status')->nullable()->default(Null);
            $table->string('occupation_description', 255)->nullable()->default(Null);
            $table->integer('vital_height')->nullable()->default(Null);
            $table->integer('vital_weight')->nullable()->default(Null);
            $table->integer('bmi')->nullable()->default(Null);
            $table->string('blood_pressure', 45)->nullable()->default(Null);
            $table->boolean('living_will')->nullable()->default(Null);
            $table->boolean('polst')->nullable()->default(Null);
            $table->boolean('poa')->nullable()->default(Null);
            $table->string('poa_name', 70)->nullable()->default(null);
            $table->string('poa_relationship', 70)->nullable()->default(null);
            $table->string('poa_phone', 14)->nullable()->default(null);
            $table->string('poa_email', 255)->nullable()->default(null);
            $table->boolean('info_prep_requested')->nullable()->default(Null);
            $table->boolean('is_living_alone')->nullable()->default(Null);
            $table->boolean('is_hearing_impaired')->nullable()->default(Null);
            $table->boolean('can_see_clearly')->nullable()->default(Null);
            $table->boolean('has_glasses_contacts')->nullable()->default(Null);
            $table->boolean('has_caregiver')->nullable()->default(Null);
            $table->boolean('cognitive_impairment')->nullable()->default(Null);
            $table->boolean('handles_own_finances')->nullable()->default(Null);
            $table->boolean('shops_independently')->nullable()->default(Null);
            $table->boolean('allergies_nkda')->nullable()->default(Null);

            // Immunizations
            foreach (config("form.section.immunizations") as $immunization) {
                $table->boolean($immunization)->nullable()->default(NULL);
                $table->date("{$immunization}_date")->nullable()->default(NULL);
                $table->boolean("{$immunization}_date_unknown")->nullable()->default(NULL);
            }

            // Routine Screenings
            foreach (config("form.section.routine_screenings") as $screening) {
                $table->boolean($screening)->nullable()->default(Null);
                $table->date("{$screening}_date")->nullable()->default(Null);
            }

            // Routine Screening results
            foreach (config("form.section.routine_screening_results") as $screening) {
                $table->string("{$screening}_results", 255)->nullable()->default(Null);
            }

            // Screening recommendations/Preventive services
            foreach (config("form.section.preventive_services") as $service) {
                $table->boolean($service)->nullable()->default(Null);
            }

            $table->boolean('psych_transportation')->nullable()->default(Null);
            $table->string('psych_transportation_desc', 45)->nullable()->default(Null);
            $table->boolean('psych_personal_safety')->nullable()->default(Null);
            $table->string('psych_personal_safety_desc', 45)->nullable()->default(Null);
            $table->boolean('psych_housing')->nullable()->default(Null);
            $table->string('psych_housing_desc', 45)->nullable()->default(Null);
            $table->boolean('psych_caregiver')->nullable()->default(Null);
            $table->string('psych_caregiver_desc', 45)->nullable()->default(Null);
            $table->boolean('psych_adls')->nullable()->default(Null);
            $table->string('psych_adls_desc', 45)->nullable()->default(Null);
            $table->boolean('psych_nutrition')->nullable()->default(Null);
            $table->string('psych_nutrition_desc', 45)->nullable()->default(Null);
            $table->string('psych_other', 45)->nullable()->default(Null);
            $table->boolean('is_complete')->nullable()->default(Null);
            $table->mediumText('other_notes')->nullable()->default(Null);
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
        Schema::dropIfExists('summaries');
    }
}
