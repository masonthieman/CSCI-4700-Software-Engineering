@header("Face To Face Visit")
<div class="row">
	<div class="col-md-3">
        <label for="">F2F Office Visit:</label>
		        @checkbox("Moderate Complexity", "medComp", "medComp")
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Face to Face Due:</label>
            @date("dueDate", ["id" => "dueDate"])
        </div>
	</div>
</div>

<div class="row">
    <div class="col-md-3">
        @checkbox("High Complexity", "highComp", "highComp")
    </div>
    <div class="col-md-3">
        <div class="form-group">
            @date("face_to_face_dueDate", ["id" => "face_to_face_dueDate"])
        </div>
	</div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="Physician/Provider Name">Physician/Provider Name</label>
                @text("phys_provider_name", ["id" => "phys_provider_name"])
        </div>
    </div>
    <div class="col-md-4">
        <div class= "form-group">
            <label for="">Phone</label>
                @phone("face_to_face_visit_provider_phone", ["id"=>"face_to_face_visit_provider_phone"])
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label>Location of Visit:</label>
        @select("Location of Visit Office", "location_of_visit_office", [
            "Office" => "Office",
            "Home" => "Home",
            "Rest Home" => "Rest Home",
            "Other" => "Other"
        ])
    </div>
</div>

<!-- <div class="row">
	<div class="col-md-4">
        <label for="">Location of Visit:</label>
    </div> 
</div>

<div class="row">
    <div class="form-group col-md">
        @checkbox("Office", "location_of_visit_office", "location_of_visit_office", 1)
    </div>
    <div class="form-group col-md">
        @checkbox("Home", "location_of_visit_home", "location_of_visit_home", 1)
    </div>
    <div class="form-group col-md">
        @checkbox("Rest Home", "location_of_visit_rest_home", "location_of_visit_rest_home", 1)
    </div>
    <div class="form-group col-md">
        @checkbox("Other", "location_of_visit_other", "location_of_visit_other", 1)
    </div>
</div> -->

@divider

<div class="row">
    <div class="form-group col-md-3">
        <label>Status</label>
        @select("Status", "face_to_face_status", [
            0 => "In Progress",
            1 => "Completed",
        ])
    </div>
</div>

@divider
@sectioncheckbox("Face to Face Scheduled", "face_to_face_scheduled", "face_to_face_scheduled", 1)
<div class="show-section">
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Date:</label>
        @date("face_to_face_scheduled_date", ["id" => "face_to_face_scheduled_date"])
    </div>
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Time:</label>
        <input type="time" id="ftf_sched_time" name="ftf_sched_time" />
    </div>
</div>

@divider
@sectioncheckbox("Face to Face Rescheduled", "face_to_face_visit_rescheduled", "face_to_face_visit_rescheduled", 1)
<div class="show-section">
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Date:</label>
        @date("face_to_face_visit_rescheduled_date", ["id" => "face_to_face_visit_rescheduled_date"])
    </div>
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Time:</label>
        <input type="time" id="ftf_resched_time" name="ftf_resched_time" />
    </div>
    <div class="col-lg-5">
        <div class="form-group">
            <label for="">Notes</label>
            @text("face_to_face_visit_notes", ["id" => "face_to_face_visit_notes"])
        </div>
    </div>
</div>

@divider
@sectioncheckbox("Non-timely Face to Face Rescheduled", "face_to_face_non_timely_rescheduled", "face_to_face_non_timely_rescheduled", 1)
<div class="show-section">
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Date:</label>
        @date("face_to_face_non_timely_rescheduled_date", ["id" => "face_to_face_non_timely_rescheduled_date"])
    </div>
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Time:</label>
        <input type="time" id="ftf_non_timely_time" name="ftf_non_timely_time" />
    </div>
    <div class="col-lg-5">
        <div class="form-group">
            <label for="">Notes</label>
            @text("face_to_face_non_timely_rescheduled_notes", ["id" => "face_to_face_non_timely_rescheduled_notes"])
        </div>
    </div>
</div>

@divider
@sectioncheckbox("Timely Face to Face Completed", "face_to_face_timely_completed", "face_to_face_timely_completed", 1)
<div class="show-section">
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Date:</label>
        @date("face_to_face_timely_completed_date", ["id" => "face_to_face_timely_completed_date"])
    </div>
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Time:</label>
        <input type="time" id="ftf_timely_time" name="ftf_timely_time" />
    </div>
</div>

@divider
@sectioncheckbox("Face to Face NOT Completed", "face_to_face_notCompleted", "face_to_face_notCompleted", 1)
<div class="show-section">
    <div class="form-group col-md-3">
        <label>Reason</label>
        @select("Reason", "face_to_face_notCompleted_reason", [
            "Patient Refused" => "Patient Refused",
            "Readmitted"=> "Readmitted",
            "Missed Time Frame" => "Missed Time Frame",
            "Deceased" => "Deceased",
            "Transportation Issue"=> "Transportation Issue",
            "Other" => "Other"
        ])
    </div>
</div>

@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="home_services" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="med_reconciliation" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>