@header("Other Outcomes")
<div>
    <h6>(Check all that apply)</h6>
    <div class="row">
        <div class="col-md-10">
            @checkbox("Readmission for new or different condition occured", "readmission_for_new_or_diff_condition_occured", "readmission_for_new_or_diff_condition_occured", 1)
        </div>
    </div>
    <div class = "row">
        <div class="col-md-2 offset-sm-1">
            <div class="form-group">
                @date("readmission_for_new_or_diff_date",["id" => "readmission_for_new_or_diff_date"])
                <label for="readmission_date"> Date</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                @text("readmission_for_new_or_diff_location",["id" => "readmission_for_new_or_diff_location"])
                <label for="readmission_location"> Location</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                @text("readmission_for_new_or_diff_icd10", ["id" => "readmission_for_new_or_diff_icd10"])
                <label for="readmission_icd10"> ICD 10</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            @checkbox("ED visit since discharge for same or similar condition", "ED_visit_same_or_similar", "ED_visit_same_or_similar", 1)
        </div>
    </div>
    <div class = "row">
        <div class="col-md-2 offset-sm-1">
            <div class="form-group">
                @date("ED_visit_same_or_similar_date",["id" => "ED_visit_same_or_similar_date"])
                <label for="ED_visit_same_or_similar_date"> Date</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                @text("ED_visit_same_or_similar_location",["id" => "ED_visit_same_or_similar_location"])
                <label for="ED_visit_same_or_similar_location"> Location</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                @text("ED_visit_same_or_similar_icd10", ["id" => "ED_visit_same_or_similar_icd10"])
                <label for="ED_visit_same_or_similar_icd10"> ICD 10</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            @checkbox("ED visit since discharge for new or different condition", "ED_visit_new_or_different", "ED_visit_new_or_different", 1)
        </div>
    </div>
    <div class = "row">
        <div class="col-md-2 offset-sm-1">
            <div class="form-group">
            @date("ED_visit_new_or_different_date",["id" => "ED_visit_new_or_different_date"])
            <label for="ED_visit_new_or_different_date"> Date</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                @text("ED_visit_new_or_different_location",["id" => "ED_visit_new_or_different_location"])
                <label for="ED_visit_new_or_different_location"> Location</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                @text("ED_visit_new_or_different_icd10", ["id" => "ED_visit_new_or_different_icd10"])
                <label for="ED_visit_new_or_different_icd10"> ICD 10</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            @checkbox("Other", "other_outcome_other", "other_outcome_other", 1)
        </div>
    </div>
    <div class = "row">
        <div class="col-md-2 offset-sm-1">
            <div class="form-group">
                @date("other_outcome_other_date", ["id" => "other_outcome_other_date"])
                <label for="other_outcome_other_date"> Date</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                @text("other_outcome_other_location", ["id" => "other_outcome_other_location"])
                <label for="other_outcome_other_location"> Location</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <label for="other_outcome_notes">Notes:</label>
            @text("other_outcome_notes", ["id" => "other_outcome_notes"])
        </div>
    </div>
</div>



@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="outcomes" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="billing" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>


