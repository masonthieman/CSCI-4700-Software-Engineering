@header("Patient Contact")

<div class = "row">
    <div class="col-md-4">
        <div class="form-group">
            <label for = "Initial Contact">Initial Contact Required On: </label>
            @date("initial_contact_required", ["id"=>"initial_contact_required"]) 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            @checkbox("1st Attempt:", "first_contact_attempt","first_contact_attempt")
        </div>
    </div>
</div>      
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label>Date:</label>
            @date("first_contact_attempt_date") 
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="first_attempt_contact_method">Method</label>
                @select(" ", "first_contact_attempt_method", [
                    0 => "Telephone",
                    1 => "E-mail",
                    2 => "Face to Face"
                ])
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label for="first_contact_attempt_time">Time:</label>
            <input type="time" id="first_contact_attempt_time" name="first_contact_attempt_time" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="first_contact_attempt_successful">Contact Attempt Successful:</label>
                @select(" ","first_contact_attempt_successful", [
                0=> "Yes",
                1=> "No"
            ])
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-inline">
            <label for="user_name">Contacted by: </label>
            @text("employee", ["disabled" => "true", "value" => Auth::user()->employee->esig()])
        </div>
    </div>
</div>
@divider
<div class = "row">
    <div class="col-md-4">
        <div class="form-group">
            <label for = "second_contact_attempt">Second Contact Required On: </label>
            @date("second_contact_required", ["id"=>"second_contact_required"]) 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form group">
            @checkbox("2nd Attempt:", "second_contact_attempt","second_contact_attempt")
        </div>
    </div>
</div>      
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Date:</label>
            @date("second_contact_attempt_date") 
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="second_contact_attempt_method">Method</label>
                @select(" ", "second_contact_attempt_method", [
                    "telephone" => "Telephone",
                    "e_mail" => "E-mail",
                    "face_to_face" => "Face to Face"
                ])
        </div>
    </div> 
    <div class="col-md-1">
        <div class="form-group">
             <label for="second_contact_attempt_time">Time:</label>
            <input type="time" id="second_contact_attempt_time" name="second_contact_attempt_time" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="second_contact_attempt_successful">Contact Attempt Successful:</label>
                @select(" ","second_contact_attempt_successful", [
                0=> "Yes",
                1=> "No"
            ])
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group form-inline">
            <label for="user_name">Contacted by: </label>
            @text("employee", ["disabled" => "true", "value" => Auth::user()->employee->esig()])
        </div>
    </div>
</div>
@divider
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="timely_initial_contact_outcome">Timely Initial Contact Outcome:</label>
            @select(" ", "timely_initial_contact_outcome", [
            0=> "Completed",
            1=> "Missed"
        ])
        </div>
    </div>
</div>
@divider
@dynamicarea("tcm_patient_contact_addl_attempt", "tcm_patient_contact_addl_attempt", "Additional Attempt")


@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="discharge" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="home_services" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>