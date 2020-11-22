@header("Medication Reconciliation")
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="med_recon_due_date">Due Date:</label>
            @date("med_recon_date",["id" => "med_recon_date"])
        </div>
    </div>
    <div class="col-md-2">
            <div class="form-group">
            <label for="med_recon_status" >Status:</label>
            @select("Required", "med_recon_status", [
                    0 => "In Progress",
                    1 => "Completed",
                ])
            </div>
        </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            @checkbox("Follow Up", "med_recon_follow_up", "med_recon_follow_up")
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
            <div class="form-group">
        <label for="med_recon_follow_up_date">Follow up date</label>
            @date("med_recon_follow_up_date",["id" => "med_recon_follow_up_date"])
            </div>
    </div>
</div>
@divider
<div class="form-group">
    <label for="">Pharmacy</label>
    @dynamicarea("med_recon_pharmacy", "med_recon_pharmacy", "Pharmacy")
</div>
@divider
<div class="form-group">
    <label for="">Medication Allergies</label>
    @checkbox('no_drug_allergy', ["id" => "no_drug_allergy"])
    @dynamicarea("med_recon_medication_allergy", "med_recon_medication_allergy", "Medication Allergies")
</div>
@divider
<div class="form-group">
    <label for="">Discharge Medication</label>
    @dynamicarea("med_recon_discharge_medication","med_recon_discharge_medication","Discharge Medications")
</div>
@divider
<div class="form-group">
    <label for="">Medication Changes</label>
    @dynamicarea("med_recon_medication_change", "med_recon_medication_change","Medication Changes (Prior Meds)")
    <div class="row">
        <div class="form-group col-md-12">
            <label for="">Notes:</label>
            @text('med_recon_medication_changes_notes', ["id" => "med_recon_medication_changes_notes"])
        </div>
    </div>
</div>
@divider
<div class="form-group">
    <label for="">Compliance Issues</label>
    @dynamicarea("med_recon_compliance_issue", "med_recon_compliance_issue", "Compliance Issues")
    <div class="row">
            <div class="form-group col-md-10">
                <label for="">Notes</label>
                @text('med_recon_compliance_issue_notes', ["id" => "med_recon_compliance_issue_notes-"])
            </div>
        </div>
</div>

@divider
<div class="horizontal">
    <div class="form-group">
            <label for=""><u>Actions:</u> Select all that apply</label>
            @checkbox("No Medication Adherence Issues", "med_recon_no_med_adherence_issues","med_recon_no_med_adherence_issues")
    </div>
</div>
<div class="horizontal">
    <div class="form-group">
        @checkbox("Care Manager Intervention Provided","med_recon_care_manager_intervention","med_recon_care_manager_intervention")
    </div>
    <div class="row col-md-10">
        <label for="">Note:</label>
        @text("med_recon_care_manager_intervention_note", ["id" => "med_recon_care_manager_intervention_note"])
    </div>
</div>
<div class="horizontal">
    <div class="form-group">
        @checkbox("Pharmacist Consult Requested","med_recon_pharm_consult_requested","med_recon_pharm_consult_requested")
    </div>
    <div class="row col-md-10">
        <label for="">Note:</label>
        @text("med_recon_pharm_consult_requested_note", ["id" => "med_recon_pharm_consult_requested_note"])
    </div>
</div>
<div class="horizontal">
    <div class="form-group">
        @checkbox("Physician Notification Completed For Identified Issues","med_recon_phys_notification_completed","med_recon_phys_notification_completed")
    </div>
    <div class="row col-md-10">
        <label for="">Note:</label>
        @text("med_recon_phy_notification_completed_note", ["id" => "med_recon_phy_notification_completed_note"])
    </div>
</div>
<div class="horizontal">
    <div class="form-group">
        <label for="">Comments:</label>
        @text("med_recon_comments", ["id" => "med_recon_comments"])
    </div>
</div>
    


<div class="row">
    <div class="col-md-8">
        <h6><u>Outcome:</u></h6>
    </div>
</div>
<div class="horizontal">
    <div class="col-md-8">
        @checkbox("Medication Reconciliation Completed Prior to Face to Face", "med_recon_completed_prior_to_face_to_face", "med_recon_completed_prior_to_face_to_face")
    </div>
    <div class="col-md-8">
        @checkbox("Medication Reconciliation Not Completed Prior to Face to Face", "med_recon_not_completed_prior_to_face_to_face", "med_recon_not_completed_prior_to_face_to_face")
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="med_recon_not_completed_prior_to_face_to_face_reason">Reason:</label>
                @text("med_recon_not_completed_prior_to_face_to_face_reason")
            </div>
        </div>
    </div>
</div>



@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="face_to_face" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="outcomes" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>