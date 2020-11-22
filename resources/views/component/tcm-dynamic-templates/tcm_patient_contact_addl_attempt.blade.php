<div data-dynamic-template-id="tcm_patient_contact_addl_attempt" class="row dynamic-form">
	<div class="dynamic-form">
	    <div class="col-md-12">
	        <div class="form-group">
	            <label for = "patient_attempt" id="patient_attempt" ></label>
	            @date("addl_contact_required", ["id"=>"addl_contact_required"]) 
	        </div>
	    </div>
    </div>
	<div class="col-md-12">
        <div class="form group" id="nextAttemptstarts">
            @checkbox("3rd Attempt:", "addl_contact_attempt","addl_contact_attempt")
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Date:</label>
            @date("addl_contact_attempt_date",["id"=>"addl_contact_attempt_date"]) 
        </div>
    </div>

    <div class="col-md-4">
    	<div class="form-group">
        <label for="contact_attempt_method">Method</label>
            @select(" ", "addl_contact_attempt_method", [
                "telephone" => "Telephone",
                "e_mail" => "E-mail",
                "face_to_face" => "Face to Face"
            ],["id" => "addl_contact_attempt_method"])
		</div>       
    </div>

    <div class="col-md-1">
	    <div class="form-group">
	        <label for="contact_attempt_time">Time:</label>
	        <input type="time" id="addl_contact_attempt_time" name="addl_contact_attempt_time" />
	    </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="addl_contact_attempt_successful">Contact Attempt Successful:</label>
                @select(" ","addl_contact_attempt_successful", [
                0=> "Yes",
                1=> "No"
            ],["id" => "addl_contact_attempt_successful"])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group ">
            <label for="user_name">Contacted by: </label>
            @text("Pemployee", ["disabled" => "true", "value" => Auth::user()->employee->esig()])
        </div>
    </div>

	@divider
	<div class="dynamic-form">
	    <div class="col-md-12">
	        <div class="form-group">
	            <label for="timely_initial_contact_outcome">Timely Initial Contact Outcome:</label>
	            @select(" ", "addl_timely_initial_contact_outcome", [
	            0=> "Completed",
	            1=> "Missed"
	            ],["id" => "addl_timely_initial_contact_outcome"])
	        </div>
	    </div>
	</div>
	@divider

	<div class="form-group col-md-2 align-self-end">
		<button class="btn btn-outline-primary btn-block removebtn" type="button" data-dynamic-action="remove">Remove</button>
	</div>
</div>
