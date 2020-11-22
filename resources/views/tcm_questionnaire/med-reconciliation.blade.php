@include("tcm_form.medication-reconciliation")
@divider
@include("tcm_form.medication-pharmacy")
@divider
@include("tcm_form.medication-allergies")
@divider
@include("tcm_form.discharge-medication")
@divider
@include("tcm_form.medication-compliance-issue")
@divider
@include("tcm_form.medication-changes")
@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="face_to_face" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="outcomes" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>