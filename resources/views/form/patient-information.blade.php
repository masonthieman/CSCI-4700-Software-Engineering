@if (isset($form))
	<div class="row">
		<div class="printing-col col-4">
			<label for="Last Name">Last Name:</label>
			<span class="printing-span capitalize">{{$form->lname}}</span>
		</div>
		<div class="printing-col col-4">
			<label for="First Name">First Name:</label>
			<span class="printing-span capitalize">{{$form->fname}}</span>
		</div>
		<div class="printing-col col-4">
			<label>Middle Name:</label>
			<span class="printing-span capitalize">{{$form->mname}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4">
			<label>Gender:</label>
			<span class="printing-span">{{ __("form.gender.$form->gender") }}</span>
		</div>
		<div class="printing-col col-4 ">
			<label>Marital Status:</label>
			<span class="printing-span">{{ucwords($form->marital_status)}}</span>
		</div>
		<div class="printing-col col-4">
			<label>Date Of Birth:</label>
			<span class="printing-span">{{dateValue($form->dob)}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-12">
			<label for="addr1">Address Line 1:</label>
			<span class="printing-span">{{$form->addr1}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-12">
			<label for="addr2">Address Line 2:</label>
			<span class="printing-span">{{$form->addr2}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4">
			<label for="city">City:</label>
			<span class="printing-span capitalize">{{$form->city}}</span>
		</div>
		<div class="printing-col col-4">
			<label for="state">State:</label>
			<span class="printing-span">@if(!empty($form->state)){{config("form.states")[$form->state]}}@endif</span>
		</div>
		<div class="printing-col col-4">
			<label for="zip">Zip Code:</label>
			<span class="printing-span">{{$form->zip}}</span>
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
		<div class="printing-col col-4">
			<label>Occupation Status:</label>
			<span class="printing-span">{{config("form.occupation_status")[$form->occupation_status]}}</span>
		</div>
		<div class="printing-col col-4">
			<label>Occupation Description:</label>
			<span class="printing-span">{{$form->occupation_description}}</span>
		</div>
        <div class="printing-col col-4">
            <label>Have you ever served in the Military?:</label>
            <span class="printing-span">{{militaryValDisplay($form->military)}}</span>
        </div>
	</div>
	<div class="row">
		<div class="printing-col col-6">
			<label for="phone_primary">Primary Phone Number:</label>
			<span class="printing-span">{{$form->phone_primary}}</span>
		</div>
		<div class="printing-col col-6">
			<label for="phone_secondary">Secondary Phone Number:</label>
			<span class="printing-span">{{$form->phone_secondary}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-6">
			<label for="email">Email:</label>
			<span class="printing-span">
				@if (isset($form->email) && !empty($form->email))
					{{$form->email}}
				@else
					No Email Id
				@endif
			</span>
		</div>
		<div class="printing-col col-6">
			<label>Preferred method of contact:</label>
			<span class="printing-span">{{selectPreferredContact($form->preferred_contact)}}</span>
		</div>
	</div>
	@divider
	<div class="row">
		<div class="col-12 text-center">
			<h5>Other Contact</h5>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-6 ">
			<label>Name:</label>
			<span class="printing-span">{{$form->other_contact_name}}</span>
		</div>
		<div class="printing-col col-6 ">
			<label>Relationship:</label>
			<span class="printing-span">{{$form->other_contact_relationship}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4 ">
			<label>Phone Number:</label>
			<span class="printing-span">{{$form->other_contact_phone}}</span>
		</div>
		<div class="printing-col col-8 ">
			<label>Email:</label>
			<span class="printing-span">{{$form->other_contact_email}}</span>
		</div>
	</div>
	@divider
	<div class="row">
		<div class="col-12 text-center">
			<h5>Best Time to Contact</h5>
		</div>
	</div>
	@if ($form instanceof \App\Models\Patient)
		<contact-time printing="1" values="{{ json_encode($form->contactTime->json()) }}"></contact-time>
	@else
		<contact-time printing="1" values="{{ json_encode($form->patient->contactTime->json()) }}"></contact-time>
	@endif
	@divider
	<div class="row">
		<div class="printing-col col-6">
			<label for="insurance_primary">Primary Insurance:</label>
			<span class="printing-span">{{$form->insurance_primary}}</span>
		</div>
		<div class="printing-col col-6">
			<label for="insurance_primary_idnum">ID#:</label>
			<span class="printing-span">{{$form->insurance_primary_idnum}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-6">
			<label for="insurance_secondary">Secondary Insurance:</label>
			<span class="printing-span">{{$form->insurance_secondary}}</span>
		</div>
		<div class="printing-col col-6">
			<label for="insurance_secondary_idnum">ID#:</label>
			<span class="printing-span">{{$form->insurance_secondary_idnum}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-12">
			<label for="emr">EMR#:</label>
			<span class="printing-span">{{$form->emr}}</span>
		</div>
	</div>
@else
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				<label>Select Practice</label>
				@selectactivepractice("practice_id")
			</div>
		</div>
		<div class="col-6">
			<div class="form-group">
				<label>Select Physician</label>
				@select("Physician", "physician_id", [], ["id" => "physician"])
			</div>
		</div>
	</div>
	@divider
	<div class="row">
		<div class="col-4">
			<div class="form-group">
				<label for="lname">Last Name</label>
				@text("lname", ["id" => "lname", "class" => "capitalize"])
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				<label for="fname">First Name</label>
				@text("fname", ["id" => "fname", "class" => "capitalize"])
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				<label for="mname">Middle Name</label>
				@text("mname", ["id" => "mname", "class" => "capitalize"])
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-4 col-md-2">
			<div class="form-group">
				<label>Gender</label>
				@select("Gender", "gender", [
					0 => "Male",
					1 => "Female"
				])
			</div>
		</div>
		<div class="col-md-4 form-group">
			<label>Marital Status</label>
			@select("Marital Status", "marital_status", [
			"single" => "Single",
			"partnered" => "Partnered",
			"married" => "Married",
			"separated" => "Separated",
			"divorced" => "Divorced",
			"widowed" => "Widowed"
			])
		</div>
		<div class="col-8 col-md-4">
			<div class="form-group">
				<label>Date of Birth</label>
				@date("dob")
			</div>
		</div>
		<div class="col-4 col-md-2">
			<label>Age</label>
			<input type="text" class="form-control" id="age" readonly>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<label for="addr1">Address Line 1</label>
				@text("addr1", ["id" => "addr1"])
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<label for="addr2">Address Line 2</label>
				@text("addr2", ["id" => "addr2"])
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="city">City</label>
				@text("city", ["id" => "city", "class" => "capitalize"])
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="state">State</label>
				@selectstate("state", request()->input("state"))
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="zip">Zip Code</label>
				@text("zip", ["id" => "zip"])
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label>Ethnicity</label>
			@selectethnicity("ethnicity1", ["id" => "ethnicity1"])
		</div>
		<div class="form-group col-md-4">
			<label>Other Ethnicity (Optional)</label>
			@selectethnicity("ethnicity2", ["id" => "ethnicity2"])
		</div>
		<div class="col-md-4 form-group">
			<label>Education</label>
			@selecteducation("education")
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-3">
			<label>Occupation Status</label>
			@select("Occupation Status", "occupation_status", config("form.occupation_status"))
		</div>
		<div class="form-group col-md-5">
			<label for="occupation_description">Occupation Description</label>
			@text("occupation_description")
		</div>
        <div class="col-md-4 form-group">
            <label>Have you ever served in the Military?</label>
            @select("Military served status", "military", [
                0 => "Yes",
                1 => "No",
                2 => "Unknown"
            ], [ "id" => "military" ])
        </div>
	</div>
	<div class="row">
		<div class="col-md-4 form-group">
			<label for="email">Email</label>
			@checkbox("None", "no_email", "no_email")
			<!-- <div class="col-md-12">
			 <input class="form-check-input" type="checkbox"  id="no_email" name="no_email" >
			 <label class="form-check-label" for="no-email">No Email</label>
			</div> -->
		</div>
	</div>
	<div data-toggle="buttons">
		<div class="row">
			<div class="col-md-12">
				
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
		</div>		
		<div class="row">
			<div class="col-md-6">
				<label for="phone_primary">Primary Phone Number</label>
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
			<div class="col-md-6">
				<label for="phone_secondary">Secondary Phone Number</label>
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
	@divider
	@header("Best Time to Contact")
	<contact-time></contact-time>
	@divider
	<div class="row">
		<div class="col-6 div form-group">
			<label for="insurance_primary">Primary Insurance</label>
			@text("insurance_primary")
		</div>
		<div class="col-6 div form-group">
			<label for="insurance_primary_idnum">ID#</label>
			@text("insurance_primary_idnum")
			<input type="hidden" name="insurance_primary_idnum_check" id="insurance_primary_idnum_check" value="0">
		</div>
	</div>
	<div class="row">
		<div class="col-6 div form-group">
			<label for="insurance_secondary">Secondary Insurance</label>
			@text("insurance_secondary")
		</div>
		<div class="col-6 div form-group">
			<label for="insurance_secondary_idnum">ID#</label>
			@text("insurance_secondary_idnum")
			<input type="hidden" name="insurance_secondary_idnum_check" id="insurance_secondary_idnum_check" value="0">
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<label for="emr">EMR#</label>
				@text("emr", ["id" => "emr"])
			</div>
		</div>
	</div>
@endif