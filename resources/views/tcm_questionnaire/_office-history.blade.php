@header("Office History")
<div class="row">
<div class="col-md-5">
        <div class="form-group">
            <label for="">Date of Last Office Visit</label>
            @date("lastVisit", ["id" => "lastVisit"])
        </div>
    </div>
    <div class="col-md-5 offset-md-2">
    <div class="form-group">
    <label for="">No Prior Office Visit?</label>
    <br />
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label for="prior_visit_yes" class="btn btn-outline-primary">
                    @input("radio", "prior_visit", ["autocomplete" => "off", "value" => "1","id" => "prior_visit_yes", "data-feedback" => "prior_visit-feedback"]) Yes
                </label>
                <label for="prior_visit_no" class="btn btn-outline-primary">
                    @input("radio", "prior_visit", ["autocomplete" => "off", "value" => "0", "id" => "prior_visit_no", "data-feedback" => "prior_visit-feedback"]) No
                </label>
            </div>
            </div>
    </div>
</div>

@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="demographics" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="admission" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>
