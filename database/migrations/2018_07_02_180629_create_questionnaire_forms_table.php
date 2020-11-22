<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->integer('practice_id')->nullable()->default(Null);
            $table->integer('practice_physician_id');
            $table->integer('employee_id');
            $table->boolean('type')->nullable()->default(Null);
            $table->string('fname', 35)->nullable()->default(Null);
            $table->string('mname', 35)->nullable()->default(Null);
            $table->string('lname', 35)->nullable()->default(Null);
            $table->boolean('gender')->nullable()->default(Null);
            $table->date('dob')->nullable()->default(Null);
            $table->string('email', 255)->nullable()->default(Null);
            $table->string('marital_status', 10)->nullable()->default(Null);
            $table->string('pd_number', 45)->nullable()->default(Null);
            $table->date('pd_last_seen')->nullable()->default(Null);
            $table->string('ethnicity1', 45)->nullable()->default(Null);
            $table->string('ethnicity2', 45)->nullable()->default(Null);
            $table->string('education', 45)->nullable()->default(Null);
            $table->boolean('military')->nullable()->default(Null);
            $table->integer('occupation_status')->nullable()->default(Null);
            $table->string('occupation_description', 255)->nullable()->default(Null);
            $table->string('vital_height', 5)->nullable()->default(Null);
            $table->integer('vital_weight')->nullable()->default(Null);
            $table->string('bmi', 10)->nullable()->default(Null);
            $table->string('blood_pressure', 30)->nullable()->default(Null);
            $table->string('vital_other', 45)->nullable()->default(Null);
            $table->boolean('living_will')->nullable()->default(Null);
            $table->boolean('polst')->nullable()->default(Null);
            $table->boolean('poa')->nullable()->default(False);
            $table->string('poa_name', 70)->nullable()->default(Null);
            $table->string('poa_relationship', 70)->nullable()->default(Null);
            $table->string('poa_phone', 14)->nullable()->default(Null);
            $table->string('poa_email', 255)->nullable()->default(Null);
            $table->boolean('info_prep_requested')->nullable()->default(Null);
            $table->boolean('measles')->nullable()->default(Null);
            $table->boolean('mumps')->nullable()->default(Null);
            $table->boolean('rubella')->nullable()->default(Null);
            $table->boolean('chickenpox')->nullable()->default(Null);
            $table->boolean('rheumatic_fever')->nullable()->default(Null);
            $table->boolean('polio')->nullable()->default(Null);

            // Immunizations
            foreach (config("form.section.immunizations") as $immunization) {
                $table->boolean($immunization)->nullable()->default(NULL);
                $table->date("{$immunization}_date")->nullable()->default(NULL);
                $table->boolean("{$immunization}_date_unknown")->nullable()->default(NULL);
            }

            $table->boolean('is_hearing_impaired')->nullable()->default(Null);
            $table->boolean('hearing_aid')->nullable()->default(Null);
            $table->date('hearing_exam')->nullable()->default(Null);
            $table->boolean('hearing_exam_unknown_date')->nullable()->default(Null);
            $table->boolean('can_see_clearly')->nullable()->default(Null);
            $table->boolean('has_glasses_contacts')->nullable()->default(Null);
            $table->boolean('cataract_glaucoma')->nullable()->default(Null);
            $table->date('vision_exam')->nullable()->default(Null);
            $table->boolean('vision_exam_unknown_date')->nullable()->default(Null);
            $table->boolean('stairs_inside')->nullable()->default(Null);
            $table->integer('stairs_inside_count')->nullable()->default(Null);
            $table->boolean('stairs_outside')->nullable()->default(Null);
            $table->integer('stairs_outside_count')->nullable()->default(Null);
            $table->boolean('fallen')->nullable()->default(Null);
            $table->boolean('rug_mats')->nullable()->default(Null);
            $table->boolean('pets')->nullable()->default(Null);
            $table->boolean('bathroom_bars')->nullable()->default(Null);
            $table->boolean('is_living_alone')->nullable()->default(Null);
            $table->boolean('hurting_you')->nullable()->default(Null);
            $table->boolean('seatbelts')->nullable()->default(Null);
            $table->string('pharmacy_name', 45)->nullable()->default(Null);
            $table->string('pharmacy_number', 45)->nullable()->default(Null);
            $table->string('exercise', 100)->nullable()->default(Null);
            $table->boolean('diet')->nullable()->default(Null);
            $table->string('typical_meal', 255)->nullable()->default(Null);
            $table->char('salt_intake', 3)->nullable()->default(Null);
            $table->char('fat_intake', 3)->nullable()->default(Null);
            $table->char('sleep_apnea', 3)->nullable()->default(Null);
            $table->boolean('cpap')->nullable()->default(Null);
            $table->integer('cpap_uses')->nullable()->default(Null);
            $table->string('cpap_working', 255)->nullable()->default(Null);
            $table->boolean('prescribed_diet')->nullable()->default(Null);
            $table->boolean('night_sleep_hours')->nullable()->default(Null);
            $table->boolean('trouble_sleeping')->nullable()->default(Null);
            $table->boolean('nap_day')->nullable()->default(Null);
            $table->boolean('sleep_aid')->nullable()->default(Null);
            $table->boolean('alcohol')->nullable()->default(Null);
            $table->string('alcohol_kind', 45)->nullable()->default(Null);
            $table->integer('alcohol_amount_week')->nullable()->default(Null);
            $table->boolean('alcohol_concern')->nullable()->default(Null);
            $table->boolean('alcohol_consider_stop')->nullable()->default(Null);
            $table->boolean('alcohol_blackouts')->nullable()->default(Null);
            $table->boolean('alcohol_binge_drink')->nullable()->default(Null);
            $table->boolean('alcohol_drive_drunk')->nullable()->default(Null);
            $table->boolean('tobacco')->nullable()->default(Null);
            $table->boolean('tobacco_cigarettes')->nullable()->default(Null);
            $table->integer('tobacco_cig_pkt_day')->nullable()->default(Null);
            $table->boolean('tobacco_chew')->nullable()->default(Null);
            $table->integer('tobacco_chew_pkt_day')->nullable()->default(Null);
            $table->boolean('tobacco_pipe')->nullable()->default(Null);
            $table->integer('tobacco_pipe_pkt_day')->nullable()->default(Null);
            $table->boolean('tobacco_cigar')->nullable()->default(Null);
            $table->integer('tobacco_cigar_pkt_day')->nullable()->default(Null);
            $table->integer('tobacco_years')->nullable()->default(Null);
            $table->year('tobacco_year_quit')->nullable()->default(Null);
            $table->boolean('street_drugs')->nullable()->default(Null);
            $table->boolean('needle_drugs')->nullable()->default(Null);
            $table->boolean('cognitive_impairment')->nullable()->default(Null);
            $table->mediumText('other_notes')->nullable()->default(Null);
            $table->boolean('depression_sad')->nullable()->default(Null);
            $table->boolean('depression_concentrating')->nullable()->default(Null);
            $table->boolean('depression_death')->nullable()->default(Null);
            $table->boolean('depression_guilt')->nullable()->default(Null);
            $table->boolean('depression_fatigue')->nullable()->default(Null);
            $table->boolean('depression_treatment')->nullable()->default(Null);
            $table->boolean('allergies_nkda')->nullable()->default(Null);

            // Devices
            foreach (config('form.section.devices') as $device) {
                $table->boolean($device)->nullable()->default(Null);
            }

            // Diagnosed by Doctors
            foreach (config('form.section.diagnosed_by_doctors') as $diognosis) {
                $table->boolean($diognosis)->nullable()->default(Null);
            }

            // Other Problems
            foreach (config('form.section.other_problems') as $otherProblem) {
                $table->boolean($otherProblem)->nullable()->default(Null);
            }
            $table->text('other_problems_notes', 1000)->nullable()->default(Null);

            // Routine Screenings
            foreach (config("form.section.routine_screenings") as $screening) {
                $table->boolean($screening)->nullable()->default(Null);
                $table->date("{$screening}_date")->nullable()->default(Null);
            }

            // Routine Screening results
            foreach (config("form.section.routine_screening_results") as $screening) {
                $table->string("{$screening}_results", 255)->nullable()->default(Null);
            }

            // Depression medication
            foreach (config('form.section.depression_medication') as $medication) {
                $table->boolean($medication)->nullable()->default(Null);
            }

            // Screening recommendations/Preventive services
            foreach (config("form.section.preventive_services") as $service) {
                $table->boolean($service)->nullable()->default(Null);
            }

            // Family history
            foreach (config("form.section.family_history") as $history) {
                $table->boolean($history)->nullable()->default(Null);
                $table->string("{$history}_relationship", 70)->nullable()->default(Null);
            }

            $table->boolean('billing_initial_awv')->nullable()->default(Null);
            $table->boolean('billing_subsequent_awv')->nullable()->default(Null);
            $table->boolean('billing_advanced_care_plan')->nullable()->default(Null);
            $table->boolean('billing_care_plan_development')->nullable()->default(Null);
            $table->boolean('is_complete')->nullable()->default(Null);
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
        Schema::dropIfExists('questionnaire_forms');
    }
}
