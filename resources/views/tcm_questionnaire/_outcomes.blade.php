@header("Outcomes")
<div class="row">
    <div class="col-md-10 text-align-center">
        <h6><u>NON-BILLABLE OUTCOMES</u>:(Select One)</h6>
    </div>
</div>

<div class = "horizontal">
    <div class = "col-md-12">
        @checkbox("Greater Than 3 Years Since Last ov","outcome_greater_than_3_years_since_last_ov","outcome_greater_than_3_years_since_last_ov", 1)
    </div>
</div>
<div class = "horizontal">
    <div class = "col-md-12">
         @checkbox("No Prior Office Visit","outcome_no_prior_office_visit","outcome_no_prior_office_visit" ,1)
    </div>
</div>
<div class = "horizontal">
    <div class = "col-md-12">
        @checkbox("Initial Contact Not Timely","outcome_initial_contact_not_timely","timely_initial_contact_outcome" , 1)
    </div>
</div>
<div class = "horizontal">
    <div class = "col-md-12">
        @checkbox("Medication Reconcilation Not Timely or Completed","med_recon_not_completed_prior_to_face_to_face" , 1)
    </div>
</div>
<div class = "horizontal">
    <div class = "col-md-12">
        @checkbox("Face to Face Not Completed","outcome_face_to_face_not_completed","face_to_face_notCompleted" , 1)
    </div>
</div>
<div class = "horizontal">
    <div class = "col-md-12">
        @checkbox("Face to Face Not Completed Timely","outcome_face_to_face_not_completed_timely","face_to_face_non_timely_rescheduled" == 1)
    </div>
</div>
<div class = "horizontal">
    <div class = "col-md-12">
        @checkbox("Patient Expired Since Discharge","outcome_patient_expired_since_discharge","outcome_patient_expired_since_discharge",1)
        
    </div>
</div>

<div class = "horizontal">
    <div class = "col-md-12">
        @checkbox("Admission Facility Type","outcome_admission_facility_type","outcome_admission_facility_type",1)
    </div>
</div>

<div class = "horizontal">
    <div class = "col-md-12">
        @checkbox("Discharge to Non-Qualified Location","outcome_discharge_to_non_qualified_location","outcome_discharge_to_non_qualified_location",1)
    </div>
</div>

<div class = "horizontal">
    <div class = "col-md-12">
        @checkbox("No Discharge Instructions Available","outcome_no_discharge_instructions_available","outcome_no_discharge_instructions_available",1)
    </div>
</div>

<div class = "horizontal">
    <div class = "col-md-12">
        @checkbox("Readmission for Same or Similar Condition","outcome_readmission_for_same_or_similar_condition_occurred","outcome_readmission_for_same_or_similar_condition_occurred",1)
    </div>
</div>
<br />
<div class="row">  
    <div class="col-md-2">
        <div class="form-group">
            @date("outcome_readmission_date", ["id" => "outcome_readmission_date"])
            <label for="outcome_readmission_date">Date</label>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            @text("outcome_readmission_location", ["id" => "outcome_readmission_location"])
            <label for="outcome_readmission_location">Location</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            @dynamicarea("tcm_outcome_icd", "tcm_outcome_icd", "ICD 10")
        </div>
    </div>
</div>

@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="med_reconciliation" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="other_outcomes" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>
