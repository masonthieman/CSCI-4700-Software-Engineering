@header("Screening Recommendations")
<div class="row">
    <div class="col-12 text-center">
        <p>Indicated below additional services recommended, based on patient response to the above questions.</p>
    </div>
</div>
@divider
@include("form.preventive-services")
@divider
@include("form.referrals-to-programs")
@divider
@include("form.risk-factors")
@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary nav-page-btn" data-change-tab="health_habits" data-tab-group="questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary nav-page-btn" data-change-tab="notes_billing" data-tab-group="questionnaire">Next</button>
    </div>
</div>
