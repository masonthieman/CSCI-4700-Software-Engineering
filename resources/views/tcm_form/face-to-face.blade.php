@header("Face To Face Visit")
@if (isset($form))
<div class="row">
	<div class="printing-col col-md-3">
        <label for="">Face To Face Office Visit</label>
       <!--  @printcheckbox($form->medComp, "Moderate Complexity") -->
    </div>
    <div class="printing-col-md-3">
        @printcheckbox($form->medComp, "Moderate Complexity")
    </div>
    <div class="printing-col-md-3">
        @printcheckbox($form->highComp, "High Complexity")
    </div>
</div>

<div class="row">
    <div class="printing-col col-md-3">
        <label for="">Face to Face Due</label>
        <span class="printing-span">{{dateValue($form->dueDate)}}</span> 
    </div>
   <!--  <div class="col-md-3">
            <span class="printing-span">{{dateValuePrint($form->dueDate)}}</span> 
    </div> -->
</div>

<!-- <div class="row">
    <div class="col-md-3">
        @printcheckbox($form->highComp, "High Complexity")
    </div>
    <div class="printing-col col-md-3">
        <span class="printing-span">{{dateValuePrint($form->face_to_face_dueDate)}}</span> 
    </div>
</div> -->

<div class="row">
    <div class="printing-col col-md-4">
		<label for="Physician/Provider Name">Physician/Provider Name</label>
        <span class="printing-span">{{$form->phys_provider_name}}</span>   
    </div>
    <div class="printing-col col-md-4">
		<label for="">Phone</label>
        <span class="printing-span">{{$form->face_to_face_visit_provider_phone}}</span>  
    </div>
</div>

<div class="row">
	<div class="col-md-4">
        <label for="">Location of Visit</label>
    </div> 
</div>

<div class="row">
    <div class="printing-col col-md-3">
        @printcheckbox($form->location_of_visit_office, "Office")
    </div>
    <div class="printing-col col-md-3">
        @printcheckbox($form->location_of_visit_home, "Home")
    </div>
    <div class="printing-col col-md-3">
        @printcheckbox($form->location_of_visit_rest_home, "Rest Home")
    </div>
    <div class="printing-col col-md-3">
        @printcheckbox($form->location_of_visit_other, "Other")
    </div>
</div>

@divider

<div class="row">
    <div class="form-group col-md-3">
        <label>Status</label>
        <span class="printing-span">
            <!-- @if(isset($form->face_to_face_status)) -->
            <?php 
            // if ($form->face_to_face_status=='0'){
            //     echo "In Progress";}else{?>
                    <?php //echo "Completed";}?>
                <!-- {{ $form->face_to_face_status }} -->
            <!-- @endif -->
            @if(isset($form->face_to_face_status))
                {{config("form.med_recon_status")[$form->face_to_face_status]}}
            @endif
        </span>
    </div>
</div>

@divider

@printcheckbox($form->face_to_face_scheduled, "Face to Face Scheduled")

    <div class="printing-col col-md-3 col-xl-3">
        <label for="">Date</label>
        <span class="printing-span">{{dateValuePrint($form->face_to_face_scheduled_date)}}</span>  
    </div>
    <div class="printing-col col-md-3 col-xl-3">
        <label for="">Time</label>
        <span class="printing-span">{{$form->ftf_sched_time}}</span> 
    </div>

@divider

@printcheckbox($form->face_to_face_visit_rescheduled, "Face to Face Rescheduled")

    <div class="printing-col col-md-3 col-xl-3">
        <label for="">Date</label>
        <span class="printing-span">{{dateValuePrint($form->face_to_face_visit_rescheduled_date)}}</span>
    </div>
    <div class="printing-col col-md-3 col-xl-3">
        <label for="">Time</label>
        <span class="printing-span">{{$form->ftf_resched_time}}</span> 
    </div>
    <div class="col-lg-8">
        <div class="form-group">
            <label for="">Notes</label>
            <span class="printing-span">{{$form->face_to_face_visit_notes}}</span> 
        </div>
    </div>

@divider

@printcheckbox($form->face_to_face_non_timely_rescheduled, "Non-timely Face to Face Rescheduled")
    <div class="printing-col col-md-3 col-xl-3">
        <label for="">Date</label>
        <span class="printing-span">{{dateValuePrint($form->face_to_face_non_timely_rescheduled_date)}}</span>
    </div>
    <div class="printing-col col-md-3 col-xl-3">
        <label for="">Time</label>
        <span class="printing-span">{{$form->ftf_non_timely_time}}</span> 
    </div>
    <div class="col-lg-8">
        <div class="form-group">
            <label for="">Notes</label>
            <span class="printing-span">{{$form->face_to_face_non_timely_rescheduled_notes}}</span> 
        </div>
    </div>

@divider
@printcheckbox($form->face_to_face_timely_completed, "Timely Face to Face Completed")

    <div class="printing-col col-md-3 col-xl-3">
        <label for="">Date</label>
        <span class="printing-span">{{dateValuePrint($form->face_to_face_timely_completed_date)}}</span>
    </div>
    <div class="printing-col col-md-3 col-xl-3">
        <label for="">Time</label>
        <span class="printing-span">{{$form->ftf_timely_time}}</span> 
    </div>


@divider

@printcheckbox($form->face_to_face_notCompleted, "Face to Face NOT Completed")
    <div class="printing-col col-md-3">
        <label>Reason</label>
        <span class="printing-span">
        @if(isset($form->face_to_face_notCompleted_reason))
            {{$form->face_to_face_notCompleted_reason}}
        @endif
        <!-- @if(isset($form->face_to_face_notCompleted_reason))
        {{config("form.face_to_face_notCompleted_reason")[$form->face_to_face_notCompleted_reason]}}
        @endif -->
        </span>
    </div>


@divider
<!-- <div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="home_services" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="med_reconciliation" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div> -->
@else
<div class="row">
	<div class="col-md-3">
        <label for="">Face To Face Office Visit</label>
		@checkbox("Moderate Complexity", "medComp", "medComp")
    </div>
    <div class="form-group col-md-3">
		<label for="">Face to Face Due</label>
		@date("dueDate", ["id" => "dueDate"])
	</div>
</div>

<div class="row">
    <div class="col-md-3">
        @checkbox("High Complexity", "highComp", "highComp")
    </div>
    <div class="form-group col-md-3">
		@date("face_to_face_dueDate", ["id" => "face_to_face_dueDate"])
	</div>
</div>

<div class="row">
    <div class="form-group col-md-4">
		<label for="Physician/Provider Name">Physician/Provider Name</label>
		@text("phys_provider_name", ["id" => "phys_provider_name"])
    </div>
    <div class="form-group col-md-4">
		<label for="">Phone</label>
		@phone("face_to_face_visit_provider_phone", ["id"=>"face_to_face_visit_provider_phone"])
    </div>
</div>

<div class="row">
	<div class="col-md-4">
        <label for="">Location of Visit</label>
    </div> 
</div>

<div class="row">
    <div class="form-group col-md-3">
        @checkbox("Office", "location_of_visit_office", "location_of_visit_office", 1)
    </div>
    <div class="form-group col-md-3">
        @checkbox("Home", "location_of_visit_home", "location_of_visit_home", 1)
    </div>
    <div class="form-group col-md-3">
        @checkbox("Rest Home", "location_of_visit_rest_home", "location_of_visit_rest_home", 1)
    </div>
    <div class="form-group col-md-3">
        @checkbox("Other", "location_of_visit_other", "location_of_visit_other", 1)
    </div>
</div>

@divider

<div class="row">
    <div class="form-group col-md-3">
        <label>Status</label>
        @select("Status", "face_to_face_status", [
            0 => "In Progress",
            1 => "Completed",
        ], ["id" => "face-to-face-status"])
    </div>
</div>

@divider
@sectioncheckbox("Face to Face Scheduled", "face_to_face_scheduled", "face_to_face_scheduled", 1)
<div class="show-section">
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Date</label>
        @date("face_to_face_scheduled_date", ["id" => "face_to_face_scheduled_date"])
    </div>
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Time</label>
		@time("ftf_sched_time", ["id" => "ftf_sched_time"])
    </div>
</div>

@divider
@sectioncheckbox("Face to Face Rescheduled", "face_to_face_visit_rescheduled", "face_to_face_visit_rescheduled", 1)
<div class="show-section">
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Date</label>
        @date("face_to_face_visit_rescheduled_date", ["id" => "face_to_face_visit_rescheduled_date"])
    </div>
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Time</label>
		@time("ftf_resched_time", ["id" => "ftf_resched_time"])
    </div>
    <div class="col-lg-8">
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
        <label for="">Date</label>
        @date("face_to_face_non_timely_rescheduled_date", ["id" => "face_to_face_non_timely_rescheduled_date"])
    </div>
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Time</label>
		@time("ftf_non_timely_time", ["id" => "ftf_non_timely_time"])
    </div>
    <div class="col-lg-8">
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
        <label for="">Date</label>
        @date("face_to_face_timely_completed_date", ["id" => "face_to_face_timely_completed_date"])
    </div>
    <div class="form-group col-md-3 col-xl-3">
        <label for="">Time</label>
		@time("ftf_timely_time", ["id" => "ftf_timely_time"])
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
        ], [ "id" => "face-to-face-notCompleted-reason" ])
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
@endif