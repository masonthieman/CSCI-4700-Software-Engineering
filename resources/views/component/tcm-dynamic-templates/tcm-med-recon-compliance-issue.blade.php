<div data-dynamic-template-id="tcm_med_recon_compliance_issues" class="dynamic-form">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="Drug">Drug</label>
            @text('med_recon_compliance_issue_drug_name', ["id" => "med_recon_compliance_issue_drug_name"])
        </div>
        <div class="form-group col-md-4">
            <label for="Reason">Reason</label>
            @select("Reason", "med_recon_compliance_issue_reason", config("form.med_recon_compliance_issue_reason"))
        </div>
        <div class="form-group col-md-4 align-self-end">
            <button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
        </div>
    </div>
</div>