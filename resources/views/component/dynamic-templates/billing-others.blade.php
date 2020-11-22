<div data-dynamic-template-id="billing_others" class="row dynamic-form">
    <div class="form-group col-md-7">
        <label>Other</label>
        @text('other_billing', ["data-feedback" => "other_billing-feedback"])
        <div data-feedback-area="other_billing-feedback" class="invalid-feedback visible"></div>
    </div>
    <div class="form group col-md-3">
        <label>CPT</label>
        @text('cpt_other_billing', ["data-feedback" => "cpt_other_billing-feedback"])
        <div data-feedback-area="cpt_other_billing-feedback" class="invalid-feedback visible"></div>
    </div>
    <div class="form-group col-md-2 align-self-end">
        <button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
    </div>
</div>
