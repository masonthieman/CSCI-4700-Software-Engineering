@header("Admissions")
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Admission Date</label>
            @date("adDate", ["id" => "adDate"])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="Hospital Name">Hospital Name</label>
            @text("hName", ["id" => "hName"])
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Admission Facility Type</label>
<!--             @select("Admission Facility Type", "admission_facility_type", [
                "ac_inpatient" => "AC Inpatient",
                "ac_observation" => "AC Observation",
                "ac_op_partial_hosp" => "AC OP Partial Hosp",
                "rehab_hospital" => "Rehab Hospital",
                "ltac_snf" => "LTAC- SNF",
                "mental_health_partial_hosp" => "Mental Health Partial Hosp",
                "other" => "Other",
            ]) -->
            @select("Admission Facility Type", "admission_facility_type", [
                "ac_inpatient" => "AC Inpatient",
                "ac_observation" => "AC Observation",
                "ac_op_partial_hosp" => "AC OP Partial Hosp",
                "rehab_hospital" => "Rehab Hospital",
                "ltac_snf" => "LTAC- SNF",
                "mental_health_partial_hosp" => "Mental Health Partial Hosp",
                "other" => "Other",
            ], ["id" => "admission-facility-type"])
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
            <label for="">Admitted Form</label>
            @select("Admitted Form", "admitted_form", [
                "direct_admission" => "Direct Admission",
                "through_ed" => "Through ED",
                "readmit_thirty" => "Re-admission w/in 30 days",
                "snf" => "SNF",
                "mental_health_facility" => "Mental Health Facility",
                "other" => "Other-Not Qualified",
                "unknown" => "Unknown",
            ], ["id" => "admitted-form"])
        </div>
    </div>
</div>

@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="office_history" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="discharge" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>