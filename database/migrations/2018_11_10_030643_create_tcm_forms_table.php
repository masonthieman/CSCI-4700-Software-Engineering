<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcmFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcm_forms', function (Blueprint $table) {
            //Demographics
            $table->increments('id');
            $table->string('emr')->nullable()->default(null);
            $table->integer('employee_id')->nullable()->default(null);
            $table->integer('patient_id')->nullable()->default(null);
            $table->string('physician_id')->nullable()->default(null);
            $table->integer('practice_id')->nullable()->default(null);
            $table->boolean('is_complete')->nullable()->default(null);
            $table->string('fname')->nullable()->default(null);
            $table->string('mname')->nullable()->default(null);
            $table->string('lname')->nullable()->default(null);
            $table->integer('gender')->nullable()->default(null);
            $table->date('dob')->nullable()->default(null);
            $table->integer('preferred_contact')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('phone_primary')->nullable()->default(null);
            $table->string('phone_secondary')->nullable()->default(null);
            $table->string('addr1')->nullable()->default(null);
            $table->string('addr2')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('zip')->nullable()->default(null);
            $table->string('marital_status')->nullable()->default(null);
            $table->string('pd_number')->nullable()->default(null);
            $table->date('pd_last_seen')->nullable()->default(null);
            $table->string('ethnicity1')->nullable()->default(null);
            $table->string('ethnicity2')->nullable()->default(null);
            $table->string('education')->nullable()->default(null);
            $table->integer('occupation_status')->nullable()->default(null);
            $table->string('occupation_description')->nullable()->default(null);
            $table->integer('military')->nullable()->default(null);
            $table->integer('living_will')->nullable()->default(null);
            $table->integer('polst')->nullable()->default(null);
            $table->integer('info_prep_requested')->nullable()->default(null);
            $table->boolean('poa')->nullable()->default(null);
            $table->string('poa_name')->nullable()->default(null);
            $table->string('poa_relationship')->nullable()->default(null);
            $table->string('poa_phone')->nullable()->default(null);
            $table->string('poa_email')->nullable()->default(null);
            $table->boolean('contact_time_mon_0')->nullable()->default(null);
            $table->boolean('contact_time_tue_0')->nullable()->default(null);
            $table->boolean('contact_time_wed_0')->nullable()->default(null);
            $table->boolean('contact_time_thu_0')->nullable()->default(null);
            $table->boolean('contact_time_fri_0')->nullable()->default(null);
            $table->boolean('contact_time_mon_1')->nullable()->default(null);
            $table->boolean('contact_time_tue_1')->nullable()->default(null);
            $table->boolean('contact_time_wed_1')->nullable()->default(null);
            $table->boolean('contact_time_thu_1')->nullable()->default(null);
            $table->boolean('contact_time_fri_1')->nullable()->default(null);
            $table->boolean('contact_time_mon_2')->nullable()->default(null);
            $table->boolean('contact_time_tue_2')->nullable()->default(null);
            $table->boolean('contact_time_wed_2')->nullable()->default(null);
            $table->boolean('contact_time_thu_2')->nullable()->default(null);
            $table->boolean('contact_time_fri_2')->nullable()->default(null);
            $table->boolean('contact_time_mon_3')->nullable()->default(null);
            $table->boolean('contact_time_tue_3')->nullable()->default(null);
            $table->boolean('contact_time_wed_3')->nullable()->default(null);
            $table->boolean('contact_time_thu_3')->nullable()->default(null);
            $table->boolean('contact_time_fri_3')->nullable()->default(null);
            $table->boolean('contact_time_mon_any')->nullable()->default(null);
            $table->boolean('contact_time_tue_any')->nullable()->default(null);
            $table->boolean('contact_time_wed_any')->nullable()->default(null);
            $table->boolean('contact_time_thu_any')->nullable()->default(null);
            $table->boolean('contact_time_fri_any')->nullable()->default(null);
            //Office History
            $table->date('lastVisit')->nullable()->default(null);
            $table->integer('prior_visit')->nullable()->default(null);
            //Admission Blade
            $table->date('adDate')->nullable()->default(null);
            $table->string('hName', 100)->nullable()->default(null);
            $table->string('admission_facility_type', 45)->nullable()->default(null);
            $table->string('admitted_form', 45)->nullable()->default(null);
            //Discharge Blade
            $table->date('discharge_date')->nullable()->default(null);
            $table->integer('discharge_instruct')->nullable()->default(null);
            $table->date('requested')->nullable()->default(null);
            $table->date('followUpDate')->nullable()->default(null);
            $table->string('discharged_to')->nullable()->default(null);
            $table->integer('dis_summary_reviewed')->nullable()->default(null);
            $table->date('dischargeRequest')->nullable()->default(null);
            $table->longtext('dischargeComment')->nullable()->default(null);
            //Patient Contact Blade
            $table->date('initial_contact_required')->nullable()->default(null);
            $table->date('second_contact_required')->nullable()->default(null);
            $table->date('second_contact_attempt_date')->nullable()->default(null);
            $table->boolean('first_contact_attempt')->nullable()->default(null);
            $table->date('first_contact_attempt_date')->nullable()->default(null);
            $table->string('first_contact_attempt_method')->nullable()->default(null);
            $table->time('first_contact_attempt_time')->nullable()->default(null);
            $table->time('second_contact_attempt_time')->nullable()->default(null);
            $table->integer('first_contact_attempt_successful')->nullable()->default(null);
            $table->boolean('second_contact_attempt')->nullable()->default(null);
            $table->string('second_contact_attempt_method')->nullable()->default(null);
            $table->integer('second_contact_attempt_successful')->nullable()->default(null);
            $table->integer('timely_initial_contact_outcome')->nullable()->default(null);
            //Home Services Blade
            $table->boolean('start_home_health')->nullable()->default(null);
            $table->string('home_health', 20)->nullable()->default(null);
            $table->longtext('hh_orders')->nullable()->default(null);
            $table->date('hh_contacted')->nullable()->default(null);
            $table->string('hh_name')->nullable()->default(null);
            $table->longtext('hh_comments')->nullable()->default(null);
            $table->date('hh_follow_up')->nullable()->default(null);
            $table->boolean('start_dme')->nullable()->default(null);
            $table->string('dme', 20)->nullable()->default(null);
            $table->longtext('dme_orders')->nullable()->default(null);
            $table->date('dme_contacted')->nullable()->default(null);
            $table->string('dme_name')->nullable()->default(null);
            $table->longtext('dme_comments')->nullable()->default(null);
            $table->date('dme_follow_up')->nullable()->default(null);
            $table->boolean('start_ptot')->nullable()->default(null);
            $table->string('ptot', 20)->nullable()->default(null);
            $table->longtext('ptot_orders')->nullable()->default(null);
            $table->date('ptot_contacted')->nullable()->default(null);
            $table->string('ptot_name')->nullable()->default(null);
            $table->longtext('ptot_comments')->nullable()->default(null);
            $table->date('ptot_follow_up')->nullable()->default(null);
            $table->boolean('start_oxygen')->nullable()->default(null);
            $table->string('oxygen', 20)->nullable()->default(null);
            $table->longtext('oxygen_orders')->nullable()->default(null);
            $table->date('oxygen_contacted')->nullable()->default(null);
            $table->string('oxygen_name')->nullable()->default(null);
            $table->longtext('oxygen_comments')->nullable()->default(null);
            $table->date('oxygen_follow_up')->nullable()->default(null);
            $table->boolean('start_lab_radiology')->nullable()->default(null);
            $table->string('lab', 20)->nullable()->default(null);
            $table->longtext('lab_orders')->nullable()->default(null);
            $table->date('lab_contacted')->nullable()->default(null);
            $table->string('lab_name')->nullable()->default(null);
            $table->longtext('lab_comments')->nullable()->default(null);
            $table->date('lab_follow_up')->nullable()->default(null);
            $table->boolean('start_other')->nullable()->default(null);
            $table->string('other', 20)->nullable()->default(null);
            $table->longtext('other_orders')->nullable()->default(null);
            $table->date('other_contacted')->nullable()->default(null);
            $table->string('other_name')->nullable()->default(null);
            $table->longtext('other_comments')->nullable()->default(null);
            $table->date('other_follow_up')->nullable()->default(null);
            //Face to Face blade
            $table->boolean('medComp')->nullable()->default(null);
            $table->date('dueDate')->nullable()->default(null);
            $table->boolean('highComp')->nullable()->default(null);
            $table->date('face_to_face_dueDate')->nullable()->default(null);
            $table->string('phys_provider_name', 50)->nullable()->default(null);
            $table->string('face_to_face_visit_provider_phone', 14)->nullable()->default(null);
            $table->boolean('location_of_visit_office')->nullable()->default(null);
            $table->boolean('location_of_visit_home')->nullable()->default(null);
            $table->boolean('location_of_visit_rest_home')->nullable()->default(null);
            $table->boolean('location_of_visit_other')->nullable()->default(null);
            $table->string('face_to_face_status', 20)->nullable()->default(null);
            $table->boolean('face_to_face_scheduled')->nullable()->default(null);
            $table->date('face_to_face_scheduled_date')->nullable()->default(null);
            $table->boolean('face_to_face_visit_rescheduled')->nullable()->default(null);
            $table->date('face_to_face_visit_rescheduled_date')->nullable()->default(null);
            $table->longtext('face_to_face_visit_notes')->nullable()->default(null);
            $table->boolean('face_to_face_non_timely_rescheduled')->nullable()->default(null);
            $table->date('face_to_face_non_timely_rescheduled_date')->nullable()->default(null);
            $table->longtext('face_to_face_non_timely_rescheduled_notes')->nullable()->default(null);
            $table->boolean('face_to_face_timely_completed')->nullable()->default(null);
            $table->date('face_to_face_timely_completed_date')->nullable()->default(null);
            $table->boolean('face_to_face_notCompleted')->nullable()->default(null);
            $table->integer('face_to_face_notCompleted_reason')->nullable()->default(null);
            $table->time('ftf_sched_time')->nullable()->default(null);
            $table->time('ftf_resched_time')->nullable()->default(null);
            $table->time('ftf_non_timely_time')->nullable()->default(null);
            $table->time('ftf_timely_time')->nullable()->default(null);
            //Medication Reconciliation
            $table->date('med_recon_date')->nullable()->default(null);
            $table->integer('med_recon_status')->nullable()->default(null);
            $table->boolean('med_recon_follow_up')->nullable()->default(null);
            $table->date('med_recon_follow_up_date')->nullable()->default(null);
            $table->boolean('med_recon_completed_prior_to_face_to_face')->nullable()->default(null);
            $table->boolean('med_recon_not_completed_prior_to_face_to_face')->nullable()->default(null);
            $table->longtext('med_recon_not_completed_prior_to_face_to_face_reason')->nullable()->default(null);
            $table->boolean('med_recon_no_med_adherence_issues')->nullable()->default(null);
            $table->boolean('med_recon_care_manager_intervention')->nullable()->default(null);
            $table->longtext('med_recon_care_manager_intervention_note')->nullable()->default(null);
            $table->boolean('med_recon_pharm_consult_requested')->nullable()->default(null);
            $table->longtext('med_recon_pharm_consult_requested_note')->nullable()->default(null);
            $table->boolean('med_recon_phys_notification_completed')->nullable()->default(null);
            $table->longtext('med_recon_comments')->nullable()->default(null);
            $table->longtext('med_recon_compliance_issue_notes')->nullable()->default(null);
            $table->longtext('med_recon_medication_changes_notes')->nullable()->default(null);
            $table->string('med_recon_phy_notification_completed_note', 45)->nullable()->default(null);
            //Outcomes
            $table->boolean('outcome_greater_than_3_years_since_last_ov')->nullable()->default(null);
            $table->boolean('outcome_no_prior_office_visit')->nullable()->default(null);
            $table->boolean('outcome_initial_contact_not_timely')->nullable()->default(null);
            $table->boolean('outcome_medication_reconciliation_not_timely_or_completed')->nullable()->default(null);
            $table->boolean('outcome_face_to_face_not_completed')->nullable()->default(null);
            $table->boolean('outcome_face_to_face_not_completed_timely')->nullable()->default(null);
            $table->boolean('outcome_patient_expired_since_discharge')->nullable()->default(null);
            $table->boolean('outcome_admission_facility_type')->nullable()->default(null);
            $table->boolean('outcome_discharge_to_non_qualified_location')->nullable()->default(null);
            $table->boolean('outcome_no_discharge_instructions_available')->nullable()->default(null);
            $table->boolean('outcome_readmission_for_same_or_similar_condition_occurred')->nullable()->default(null);
            $table->date('outcome_readmission_date')->nullable()->default(null);
            $table->string('outcome_readmission_location', 45)->nullable()->default(null);
            //Other Outcomes Blade
            $table->boolean('readmission_for_new_or_diff_condition_occured')->nullable()->default(null);
            $table->date('readmission_for_new_or_diff_date')->nullable()->default(null);
            $table->string('readmission_for_new_or_diff_location', 45)->nullable()->default(null);
            $table->string('readmission_for_new_or_diff_icd10', 10)->nullable()->default(null);
            $table->boolean('ED_visit_same_or_similar')->nullable()->default(null);
            $table->date('ED_visit_same_or_similar_date')->nullable()->default(null);
            $table->string('ED_visit_same_or_similar_location', 45)->nullable()->default(null);
            $table->string('ED_visit_same_or_similar_icd10', 10)->nullable()->default(null);
            $table->boolean('ED_visit_new_or_different')->nullable()->default(null);
            $table->date('ED_visit_new_or_different_date')->nullable()->default(null);
            $table->string('ED_visit_new_or_different_location', 45)->nullable()->default(null);
            $table->string('ED_visit_new_or_different_icd10', 10)->nullable()->default(null);
            $table->boolean('other_outcome_other')->nullable()->default(null);
            $table->longtext('other_outcome_notes')->nullable()->default(null);
            $table->date('other_outcome_other_date')->nullable()->default(null);
            $table->string('other_outcome_other_location', 45)->nullable()->default(null);
            //Billing Blade
            $table->date('billing_follow_up_date')->nullable()->default(null);
            $table->integer('billing_ending')->nullable()->default(null);
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
        Schema::dropIfExists('tcm_forms');
    }
}
