@include("tcm_form.demographics")
@divider
@include("tcm_form.advanced_directives")
@divider
@include("tcm_form.best_time_to_contact")
@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" disabled>Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="office_history" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>

