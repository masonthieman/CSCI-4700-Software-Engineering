<div class="form-group col-md-4 col-xl-3">
    <label for="">Follow-Up Date: </label>
    @date("billing_follow_up_date")
</div>


<div class="form-group col-md-3">
        <label>Ending</label>
        @select("Ending (must choose one)", "billing_ending", [
            0 => "99495 Moderate Complexity",
            1 => "99496 High Complexity",
            2 => "99495 Moderate Complexity (Telehealth)",
            3 => "99496 High Complexity (Telehealth)",
            4 => "Unsuccessful TCM-Unable to Bill"
        ])
</div>

@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="outcomes" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" disabled>Next</button>
    </div>
</div>