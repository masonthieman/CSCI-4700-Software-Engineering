@header("Discharge")
<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="">Discharge Date</label>
            @date("discharge_date", ["id" => "discharge_date"])
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="">Discharge Instruction</label>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label for="discharge_instruct-yes" class="btn btn-outline-primary">
                    @input("radio", "discharge_instruct", ["autocomplete" => "off", "value" => "1", "id" => "discharge_instruct-yes", "data-feedback" => "discharge_instruct-feedback"]) Yes
                </label>
                <label for="discharge_instruct-no" class="btn btn-outline-primary">
                    @input("radio", "discharge_instruct", ["autocomplete" => "off", "value" => "0", "id" => "discharge_instruct-no", "data-feedback" => "discharge_instruct-feedback"]) No
                </label>
            </div>
            <div class="invalid-feedback visible" data-feedback-area="discharge_instruct-feedback"></div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <label for="">Discharge Instructions Requested</label>
            @date("requested", ["id" => "requested"])
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <div class="form-group">
            <label for="">Follow Up Date</label>
            @date("followUpDate", ["id" => "followUpDate"])
        </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Discharged To</label>
            @select("Discharged To", "discharged_to", [
                "home" => "Home",
                "family_member_home" => "Family Member Home",
                "non_family_member_home" => "Non-family member home",
                "assisted_living" => "Assisted Living",
                "rest_foster_home" => "Rest/Foster Home",
                "hospice" => "Hospice- TCM is N/A",
                "snf" => "SNF- TCM is N/A",
                "rehab" => "Rehab- TCM N/A",
                "other" => "Other-Not Qualified"
            ], ["id" => "discharged-to"])
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
        <label for="">Discharge ICD-10</label>
            {{-- <name> <template-id> --}}
            @dynamicarea("discharge_icd", "discharge_icd", "Entry")
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Discharge Summary Reviewed</label>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label for="dis_summary_reviewed_yes" class="btn btn-outline-primary">
                    @input("radio", "dis_summary_reviewed", ["autocomplete" => "off", "value" => "1", "id" => "dis_summary_reviewed_yes", "data-feedback" => "dis_summary_reviewed-feedback"]) Yes
                </label>
                <label for="dis_summary_reviewed_no" class="btn btn-outline-primary">
                    @input("radio", "dis_summary_reviewed", ["autocomplete" => "off", "value" => "0", "id" => "dis_summary_reviewed_no", "data-feedback" => "dis_summary_reviewed-feedback"]) No
                </label>
            </div>
            <div class="invalid-feedback visible" data-feedback-area="dis_summary_reviewed-feedback"></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Discharge Summary Requested</label>
            @date("dischargeRequest", ["id" => "dischargeRequest"])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="dischargeComment">Comment</label>
            @text("dischargeComment", ["id" => "dischargeComment"])
        </div>
    </div>
</div>

@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="admission" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="patient_contact" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>