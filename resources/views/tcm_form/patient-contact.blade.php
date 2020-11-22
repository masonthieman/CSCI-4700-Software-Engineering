@header("Patient Contact")
@if (isset($form))
<div class="row">

    <div class="printing-col col-md-6">
        <label for = "Initial Contact">Initial Contact Required By: </label>
        <span class="printing-span">{{dateValuePrint($form->initial_contact_required)}}</span> 
    </div>


    <div class="printing-col col-md-3">
    	@printcheckbox($form->first_contact_attempt, "1st Attempt")
    </div>

    <div class="printing-col col-md-3">
        <label>Date:</label>
        <span class="printing-span">{{dateValuePrint($form->first_contact_attempt_date)}}</span> 
    </div>


    <div class="printing-col col-md-6">
        <label for="first_attempt_contact_method">Method</label>
		<span class="printing-span">
			@if(isset($form->first_contact_attempt_method))
			    {{config("form.first_contact_attempt_method")[$form->first_contact_attempt_method]}}
		    @endif
		</span>
    </div>

    <div class="printing-col col-md-3">
        <label for="first_contact_attempt_time">Time:</label>
        <span class="printing-span">{{$form->first_contact_attempt_time}}</span>
    </div>


    <div class="printing-col col-md-3">

        <label for="first_contact_attempt_successful">Contact Attempt Successful:</label>
        <span class="printing-span">
            @if(isset($form->first_contact_attempt_successful))
           	    {{ config("form.first_contact_attempt_successful")[$form->first_contact_attempt_successful] }}
            @endif
        </span>
    </div>


    <div class="printing-col col-md-3">
        <label for="user_name">Contacted by: </label>
        <span class="printing-span">{{$form->employee->esig()}}</span>
    </div>
</div>
@divider
<div class="row">

    <div class="printing-col col-md-6">
        <label for = "second_contact_attempt">Second Contact Required By: </label>
         <span class="printing-span">{{dateValuePrint($form->second_contact_required)}}</span>
    </div>


    <div class="printing-col col-md-3">
    	@printcheckbox($form->second_contact_attempt, "2nd Attempt")
    </div>

    <div class="printing-col col-md-3">
        <label>Date:</label>
        <span class="printing-span">{{dateValuePrint($form->second_contact_attempt_date) }}</span>
    </div>

    <div class="printing-col col-md-6">
        <label for="second_contact_attempt_method">Method</label>
       <span class="printing-span">
       		@if(isset($form->second_contact_attempt_method))
               {{config("form.second_contact_attempt_method")[$form->second_contact_attempt_method]}}
		    @endif
		</span>
    </div>
 
   
    <div class="printing-col col-md-3">
       <label for="second_contact_attempt_time">Time:</label>
       <span class="printing-span">{{$form->second_contact_attempt_time}}</span>
   </div>

    <div class="printing-col col-md-3">
        <label for="second_contact_attempt_successful">Contact Attempt Successful:</label>
       		<span class="printing-span">
            @if(isset($form->first_contact_attempt_successful))
       			{{ config("form.second_contact_attempt_successful")[$form->second_contact_attempt_successful] }}
            @endif
       		</span>
    </div>

    <div class="printing-col col-md-3">
        <label for="user_name">Contacted by: </label>
        <span class="printing-span">{{$form->employee->esig()}}</span>
    </div>


@divider
    <div class="printing-col col-md-3">
        <label for="timely_initial_contact_outcome">Timely Initial Contact Outcome:</label>
       		<span class="printing-span">
       			@if(isset($form->timely_initial_contact_outcome))
       				{{ config("form.timely_initial_contact_outcome")[$form->timely_initial_contact_outcome] }}
       			@endif
		    </span>
    </div>
@divider
</div>

    @foreach($form->tcm_patient_contact_addl_attempt as $tcm_patient_contact_addl_attempt)
        <div class="row">
            <div class="printing-col col-md-6">
                <label for="">Third Contact Required By:</label>
                <span class="printing-span">{{date('m-d-Y',strtotime($tcm_patient_contact_addl_attempt->addl_contact_attempt_date))}}</span>
            </div>
            <div class="printing-col col-md-3">
                <!-- @printcheckbox($form->first_contact_attempt, "1st Attempt") -->
                @printcheckbox($tcm_patient_contact_addl_attempt->addl_contact_attempt, "3rd Attempt")
            </div>
            <div class="printing-col col-md-3">
                <label for="">Date:</label>
                <span class="printing-span">{{date('m-d-Y',strtotime($tcm_patient_contact_addl_attempt->addl_contact_attempt_date))}}</span>
            </div>
            <div class="printing-col col-md-6">
                <label for="">Method </label>
                <span class="printing-span">{{$tcm_patient_contact_addl_attempt->addl_contact_attempt_method}}</span>
            </div>
            <div class="printing-col col-md-3">
                <label for="">Time:</label>
                <span class="printing-span">{{$tcm_patient_contact_addl_attempt->addl_contact_attempt_time}}</span>
            </div>
             <div class="printing-col col-md-3">
                <label for="user_name">Contacted by: </label>
                <span class="printing-span">{{$form->employee->esig()}}</span>
            </div>
            <div class="printing-col col-md-3">
                <label for="">Contact Attempt Successful: </label>
                <span class="printing-span">
                @if(isset($tcm_patient_contact_addl_attempt->addl_contact_attempt_successful))
                {{ config("form.addl_contact_attempt_successful")[$tcm_patient_contact_addl_attempt->addl_contact_attempt_successful]}}
                @endif
                </span>
            </div>

             <div class="printing-col col-md-3">
                <label for="">Timely Initial Contact Outcome: </label>
                <span class="printing-span">
                	<!-- {{ $tcm_patient_contact_addl_attempt->addl_timely_initial_contact_outcome }} -->
                    @if(isset($tcm_patient_contact_addl_attempt->addl_timely_initial_contact_outcome)) 
                        {{config("form.addl_timely_initial_contact_outcome")[$tcm_patient_contact_addl_attempt->addl_timely_initial_contact_outcome]}}
                    @endif
                </span>
            </div>
        </div>
    @endforeach
<!-- @dynamicarea("tcm_patient_contact_addl_attempt", "tcm_patient_contact_addl_attempt", "Additional Attempt") -->
<!-- 
@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="discharge" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="home_services" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div> -->
@else
<div class = "row">
    <div class="col-md-4">
        <div class="form-group">
            <label for = "Initial Contact">Initial Contact Required By: </label>
            @date("initial_contact_required", ["id"=>"initial_contact_required"]) 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            @checkbox("1st Attempt:", "first_contact_attempt","first_contact_attempt", ["id"=>"first_contact_attempt"])
        </div>
    </div>
</div>      
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Date:</label>
            @date("first_contact_attempt_date",["id" => "first-contact-attempt-date"]) 
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
            <label for = "second_contact_attempt">Second Contact Required By: </label>
            @date("second_contact_required", ["id"=>"second-contact-attempt-date"]) 
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
            0 => "Telephone",
            1 => "E-mail",
            2 => "Face to Face"
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
            ],["id" => "timely-initial-contact-outcome"])
        </div>
    </div>
</div>
@divider
@dynamicarea("tcm_patient_contact_addl_attempt", "tcm_patient_contact_addl_attempt",  "Additional Attempt")
	@push("dynamic_templates")
		@include("component.tcm-dynamic-templates.tcm_patient_contact_addl_attempt")
	@endpush

@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="discharge" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="home_services" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>  
@endif