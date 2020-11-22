@header("Demographics")
@if (isset($form))
	@if (Auth::user() && Auth::user()->is_admin)
		<div class="row">
			<div class="printing-col col-md-6">
				@printcheckbox($form->start_tcm, "Start TCM")
			</div>
		</div>
		<div class="row">
			<div class="printing-col col-md-6">
				<label for="patient_id">Assign TCM:</label>
			    <span class="printing-span">@if(!empty($form->assigned_care_manager->lname)){{$form->assigned_care_manager->lname}}@endif @if(!empty($form->assigned_care_manager->fname)){{$form->assigned_care_manager->fname}}@endif</span>
			</div>
			<div class="printing-col col-md-6">
				<label for="practice_id">Reassign TCM:</label>
			    <span class="printing-span">@if(!empty($form->reassigned_care_manager->lname)){{$form->reassigned_care_manager->lname}}@endif @if(!empty($form->reassigned_care_manager->fname)){{$form->reassigned_care_manager->fname}}@endif</span>
			</div>
		</div>
	@endif
	<div class="row">
		<div class="printing-col col-md-4">
            <label>Last Name:</label>
            <span class="printing-span capitalize">{{$form->lname}}</span>
        </div>
        <div class="printing-col col-md-4">
            <label>Middle Name:</label>
            <span class="printing-span capitalize">{{$form->mname}}</span>
        </div>
        <div class="printing-col col-md-4">
            <label>First Name:</label>
            <span class="printing-span capitalize">{{$form->fname}}</span>
        </div>
	</div>
    <div class="row">
        <div class="col-md-3 col-lg-2 printing-col">
            <label>Gender: </label>
            <span class="printing-span">{{ __("form.gender.$form->gender") }}</span>
        </div>
        <div class="col-9 col-md-7 col-lg-4 printing-col">
			<label>Date of Birth:</label>
			<span class="printing-span">
				@if(!empty($form->dob))
					{{dateValuePrint($form->dob)}}
				@endif
			</span>
        </div>
        <div class="col-3 col-md-2 col-lg-1 printing-col">
			<label>Age:</label>
			<span class="printing-span">{{yearsSince($form->dob)}}</span>
        </div>
        <div class="col-lg-5 printing-col">
			<label>Email Address:</label>
            <span class="printing-span">{{$form->email}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-md-6">
			<label for="addr1">Address Line 1:</label>
			<span class="printing-span">{{$form->addr1}}</span>
		</div>
		<div class="printing-col col-md-6">
			<label for="addr2">Address Line 2:</label>
			<span class="printing-span">{{$form->addr2}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-md-4 col-xl-4">
			<label for="city">City:</label>
			<span class="printing-span capitalize">{{$form->city}}</span>
		</div>
		<div class="col-md-4 col-xl-2 printing-col">
			<label for="state">State:</label>
			<span class="printing-span">@if(!empty($form->state)){{config("form.states")[$form->state]}}@endif</span>
		</div>
		<div class="col-md-4 col-xl-2 printing-col">
			<label for="zip">Zip Code:</label>
			<span class="printing-span">{{$form->zip}}</span>
		</div>
		<div class="col-lg-4 printing-col">
			<label>Marital Status:</label>
            <span class="printing-span">{{$form->marital_status}}</span>
		</div>
		<div class="printing-col col-6">
			<label for="phone_primary">Primary Phone Number:</label>
			<span class="printing-span">{{$form->phone_primary}}</span>
		</div>
		<div class="printing-col col-6">
			<label for="phone_secondary">Secondary Phone Number:</label>
			<span class="printing-span">{{$form->phone_secondary}}</span>
		</div>
		<div class="printing-col col-6">
			<label>Preferred method of contact:</label>
			<span class="printing-span">{{selectPreferredContact($form->preferred_contact)}}</span>
		</div>
    </div>
	<div class="row">
		<div class="col-xl-3 printing-col">
			<label>Select Practice:</label>
			<span class="printing-span">{{$form->practice['name']}}</span>
		</div>
		<div class="printing-col col-md-4 col-xl-3">
			<label for="">Primary Care Doctor:</label>
			<span class="printing-span">@if(!empty($form->physician['name'])){{$form->physician['name']}}@endif</span>
		</div>
		<div class="col-md-4 col-xl-3 printing-col">
			<label for="">Office Phone Number:</label>
			<span class="printing-span">{{$form->pd_number}}</span>
		</div>
		<div class="printing-col col-md-4 col-xl-3">
			<label for="">Date Last Seen:</label>
            <span class="printing-span">
				@if(!empty($form->pd_last_seen))
					{{date('m-d-Y',strtotime($form->pd_last_seen))}}
				@endif
			</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4">
			<label>Ethnicity:</label>
			<span class="printing-span">{{$form->ethnicity1}}</span>
		</div>
		<div class="printing-col col-4">
			<label>Other Ethnicity (Optional):</label>
			<span class="printing-span">{{$form->ethnicity2}}</span>
		</div>
		<div class="printing-col col-4 ">
			<label>Education:</label>
			<span class="printing-span">{{$form->education}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-3">
			<label>Occupation Status:</label>
			<span class="printing-span">
				@if(isset($form->occupation_status))
				    {{config("form.occupation_status")[$form->occupation_status]}}
			    @endif
			</span>
		</div>
		<div class="printing-col col-5">
			<label>Occupation Description:</label>
			<span class="printing-span">{{$form->occupation_description}}</span>
		</div>
		<div class="col-4 printing-col">
            <label>Have you ever served in the Military?:</label>
			<span class="printing-span">
				<!-- @if(!empty($form->military))
				    {{config("form.military")[$form->military]}}
			    @endif -->
				<span class="printing-span">{{militaryValDisplay($form->military)}}</span>
			</span>
		</div>
	</div>
	<div class="row">
			<div class="printing-col col-md-12">
				<label>Other Contact :</label>
			</div>
		</div>
		<div class="row">
			<div class="printing-col col-lg-4 col-md-6 form-group">
				<label>Name</label>
				<span class="printing-span">{{$form->other_contact_name}}</span>
			</div>
			<div class="printing-col col-lg-4 col-md-6 form-group">
				<label>Relationship</label>
				<span class="printing-span">{{$form->other_contact_relationship}}</span>
			</div>
			<div class="printing-col col-lg-4 col-md-6 form-group">
				<label>Email</label>
				<span class="printing-span">{{$form->other_contact_email}}</span>
			</div>
		</div>

		<div class="row">
			<div class="printing-col col-lg-6 col-md-4 form-group">
				<label>Phone Number</label>
				<span class="printing-span">{{$form->other_contact_phone}}</span>
			</div>
			<div class="printing-col col-lg-6 col-md-4">
				<label>Preferred method of contact:</label>
				<span class="printing-span">{{selectPreferredContact($form->preferred_contact)}}</span>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="invalid-feedback visible" data-feedback-area="other-preferred-feedback"></div>
			</div>
		</div>
@else
	@if (Auth::user() && Auth::user()->is_admin)
		<div class = row>
			<div class="form-group col-md-6">
					@checkbox("Start TCM", "start_tcm", "start_tcm", 1)
			</div>
		</div>

		<!-- TODO -->
		<!-- Needs to assign patient to employee in assigned_patients table -->
		<!-- Patient and employee can be selected, just not sure how to store -->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="patient_id">Assign TCM</label>
					@selectassigntcm("assigned_to")
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="practice_id">Reassign TCM</label>
					@selectreassigntcm("reassigned_to")
				</div>
			</div>
		</div>
	@endif
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="Last Name">Last Name</label>
				@text("lname", ["id" => "lname"])
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="First Name">First Name</label>
				@text("fname", ["id" => "fname"])
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="">Middle Name</label>
				@text("mname", ["id" => "mname"])
			</div>
		</div>
	</div>
	<div data-toggle="buttons">
    <div class="row">
        <div class="col-md-3 col-lg-2 form-group">
            <yes-no name="gender" label-no="Male" label-yes="Female">Gender</yes-no>
        </div>
        <div class="col-9 col-md-7 col-lg-4">
            <div class="form-group">
                <label>DOB</label>
                @date("dob", ["id" => "dob"])
            </div>
        </div>
        <div class="col-3 col-md-2 col-lg-1">
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" id="age" readonly>
            </div>
        </div>
        <div class="col-lg-5">
			<label for="email">Email</label>
			<div class="input-group form-group">
				<div class="input-group-prepend btn-group btn-group-toggle" >
					<label class="btn btn-outline-primary" for="email-preferred">
						Preferred
						@input("radio", "preferred_contact", ["id" => "email-preferred", "value" => "2", "data-feedback" => "contact-preferred-feedback"])
					</label>
				</div>
				@email("email", ["id" => "email"])
			</div>
		</div>
		<!-- <div class="col-5 col-md-5 col-lg-5">
			<label for="email">Email</label>
				<div class="input-group">
     				<div class="input-group-prepend">
       					<span class="btn btn-outline-primary">Preferred</span>
					</div>
						<input type="text" class="form-control" name="email" id="email">	
				</div>	
  		</div> -->
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="addr1">Address Line 1</label>
				@text("addr1", ["id" => "addr1"])
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="addr2">Address Line 2</label>
				@text("addr2", ["id" => "addr2"])
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4 col-xl-4">
			<label for="">City</label>
			@text("city", ["id" => "city"])
		</div>
		<div class="col-md-4 col-xl-2 form-group">
			<label for="">State</label>
			@selectstate("state", request()->input("state"))
		</div>
		<div class="col-md-4 col-xl-2 form-group">
			<label for="">Zip Code</label>
			@text("zip", ["id" => "zip"])
		</div>
		<div class="col-lg-4 form-group">
			<label>Marital Status</label>
			@selectmaritalstatus("marital_status")
		</div>
		<div class="col-md-6 form-group">
			<label for="primary_phone">Primary Phone Number</label>
			<div class="input-group form-group">
				<div class="input-group-prepend btn-group btn-group-toggle" >
					<label class="btn btn-outline-primary" for="phone-primary-preferred">
						Preferred
						@input("radio", "preferred_contact", ["id" => "phone-primary-preferred", "value" => "0", "data-feedback" => "contact-preferred-feedback"])
					</label>
				</div>
				@phone("phone_primary")
			</div>
		</div>
		<div class="col-md-6 form-group">
			<label for="secondary_phone">Secondary Phone Number</label>
				<div class="input-group form-group">
					<div class="input-group-prepend btn-group btn-group-toggle" >
						<label class="btn btn-outline-primary" for="phone-secondary-preferred">
							Preferred
							@input("radio", "preferred_contact", ["id" => "phone-secondary-preferred", "value" => "1", "data-feedback" => "contact-preferred-feedback"])
						</label>
					</div>
					@phone("phone_secondary")
				</div>
		</div>
		<!-- <div class="col-md-6 form-group">
			<label for="primary_phone">Primary Phone Number</label>
			<div class="input-group form-group">
				<div class="input-group-prepend btn-group btn-group-toggle" >
					<span class="btn btn-outline-primary">	Preferred </span>
				</div>
				@phone("phone_primary")
			</div>
		</div>
		<div class="col-md-6 form-group">
			<label for="secondary_phone">Secondary Phone Number</label>
			<div class="input-group form-group">
				<div class="input-group-prepend btn-group btn-group-toggle" >
					<span class="btn btn-outline-primary">	Preferred </span>
				</div>
				@phone("phone_secondary")
			</div>
		</div> -->
    </div>
	<div class="row">
		<div class="col-xl-3 form-group">
				<label>Select Practice</label>
				@selectpractice("practice_id")
		</div>
		<div class="form-group col-md-4 col-xl-4">
			<label for="">Primary Care Doctor</label>
			@select("Physician", "physician_id", [], ["id" => "physician"])
		</div>
		<div class="col-md-4 col-xl-2 form-group">
			<label for="">Office Phone Number</label>
			@phone("pd_number")
		</div>
		<div class="form-group col-md-4 col-xl-3">
			<label for="">Date Last Seen</label>
			@date("pd_last_seen")
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="">Ethnicity</label>
			@selectethnicity("ethnicity1", ["id" => "ethnicity1"])
		</div>
		<div class="form-group col-md-4">
			<label for="">Other Ethnicity (Optional)</label>
			@selectethnicity("ethnicity2", ["id" => "ethnicity2"])
		</div>
		<div class="col-md-4 form-group">
			<label for="">Education</label>
			@selecteducation("education")
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-3">
			<label>Occupation Status</label>
			@select("Occupation Status", "occupation_status", [
				0 => "Working",
				1 => "Retired",
				2 => "Disabled"
			])
		</div>
		<div class="form-group col-md-6">
			<label>Occupation Description</label>
			@text("occupation_description")
		</div>
		<div class="col-md-3 form-group">
			<!--<yes-no name="military">Have you ever served in the Military?</yes-no>-->
			<label>Have you ever served in the Military?</label>
			@select("Military served status", "military", [
				0 => "Yes",
				1 => "No",
				2 => "Unknown"
			])
		</div>
	</div>
	<div class="row">
			<div class="col-md-12">
				<label>Other Contact</label>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-4 col-md-6 form-group">
				<label>Name</label>
				@text("other_contact_name")
			</div>
			<div class="col-lg-2 col-md-6 form-group">
				<label>Relationship</label>
				@text("other_contact_relationship")
			</div>
			<div class="col-lg-2 col-md-4 form-group">
				<label>Phone Number</label>
				@phone("other_contact_phone")
			</div>
			<div class="col-lg-4 col-md-8 form-group">
				<label>Email</label>
				@email("other_contact_email")
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-right">
				<span class="invalid-feedback visible" style="display: inline;" data-feedback-area="contact-preferred-feedback"></span>
				<div class="btn-group btn-group-toggle">
					<label class="btn btn-outline-primary" for="preferred_contact">
						Preferred
						@input("radio", "preferred_contact", ["id" => "other-preferred", "value" => "3", "data-feedback" => "contact-preferred-feedback"])
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="invalid-feedback visible" data-feedback-area="other-preferred-feedback"></div>
			</div>
		</div>
		</div>
		
@endif

