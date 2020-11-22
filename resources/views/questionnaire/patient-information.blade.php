@include("form.patient-information-questionnaire")
@divider
@include("form.living-in-home")
@divider
@include("form.vital-signs")
@divider
@include("form.advanced-directives")
@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" disabled>Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary nav-page-btn" data-change-tab="personal_health_history" data-tab-group="questionnaire">Next</button>
    </div>
</div>
