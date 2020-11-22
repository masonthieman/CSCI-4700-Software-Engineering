@header("Patient Information")
@if (isset($form))
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
        <div class="printing-col col-md-4">
            <label>Gender: </label>
            <span class="printing-span">{{ __("form.gender.$form->gender") }}</span>
        </div>
        <div class="printing-col col-md-6">
            <label>Date of Birth:</label>
            <span class="printing-span">{{dateValue($form->dob)}}</span>
        </div>
        <div class="printing-col col-md-2">
            <label>Age:</label>
            <span class="printing-span">{{calAge($form->dob)}}</span>
        </div>
    </div>
    <div class="row">
		<div class="printing-col col-12">
			<label for="addr1">Address Line 1:</label>
			<span class="printing-span">{{$form->patient->addr1}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-12">
			<label for="addr2">Address Line 2:</label>
			<span class="printing-span">{{$form->patient->addr2}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-4">
			<label for="city">City:</label>
			<span class="printing-span capitalize">{{$form->patient->city}}</span>
		</div>
		<div class="printing-col col-4">
			<label for="state">State:</label>
			<span class="printing-span">@if(!empty($form->patient->state)){{config("form.states")[$form->patient->state]}}@endif</span>
		</div>
		<div class="printing-col col-4">
			<label for="zip">Zip Code:</label>
			<span class="printing-span">{{$form->patient->zip}}</span>
		</div>
	</div>
    <div class="row">
        <div class="printing-col col-md-8">
            <label>Email Address:</label>
            <span class="printing-span">{{$form->email}}</span>
        </div>
        <div class="printing-col col-md-4 ">
            <label>Marital Status:</label>
            <span class="printing-span">{{$form->marital_status}}</span>
        </div>
    </div>
    <div class="row">
        <div class="printing-col col-md-12">
            <label>Primary Care Doctor:</label>
            <span class="printing-span">
			    @if(!empty($form->physician->name))
				    {{$form->physician->name}}
			    @endif
			</span>
        </div>
    </div>
    <div class="row">
        <div class="printing-col col-md-6">
            <label>Office Phone Number:</label>
            <span class="printing-span">{{$form->pd_number}}</span>
        </div>
        <div class="printing-col col-md-6">
            <label>Date Last Seen:</label>
            <span class="printing-span">{{dateValue($form->pd_last_seen)}}</span>
        </div>
    </div>
    <div class="row">
        <div class="printing-col col-md-4">
            <label>Ethnicity:</label>
            <span class="printing-span">{{$form->ethnicity1}}</span>
        </div>
        <div class="printing-col col-md-4">
            <label>Other Ethnicity (Optional):</label>
            <span class="printing-span">{{$form->ethnicity2}}</span>
        </div>
        <div class="printing-col col-md-4 ">
            <label>Education:</label>
            <span class="printing-span">{{$form->education}}</span>
        </div>
    </div>
    <div class="row">
        <div class="printing-col col-4">
            <label>Occupation Status:</label>
            <span class="printing-span"> @if(!empty(config("form.occupation_status")[$form->occupation_status]))
                    {{config("form.occupation_status")[$form->occupation_status]}}
			    @endif</span>
        </div>
        <div class="printing-col col-8">
            <label>Occupation Description:</label>
            <span class="printing-span">{{$form->occupation_description}}</span>
        </div>
        <div class="printing-col col-12">
            <label>Have you ever served in the Military?:</label>
            <span class="printing-span">{{militaryValDisplay($form->military)}}</span>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="Last Name">Last Name</label>
                @text("lname", ["id" => "lname", "class" => "capitalize"])
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="First Name">First Name</label>
                @text("fname", ["id" => "fname", "class" => "capitalize"])
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Middle Name</label>
                @text("mname", ["id" => "mname", "class" => "capitalize"])
            </div>
        </div>
    </div>
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
            <div class="form-group">
                <label>Email Address</label>
                @text("email")
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 form-group">
            <label>Marital Status</label>
            @selectmaritalstatus("marital_status")
        </div>
        <div class="form-group col-md-4 col-xl-4">
            <label>Primary Care Doctor</label>
            @select("Physician", "physician_id", [], ["id" => "physician"])
        </div>
        <div class="col-md-4 col-xl-2 form-group">
            <label>Office Phone Number</label>
            @phone("pd_number")
        </div>
        <div class="form-group col-md-4 col-xl-3">
            <label>Date Last Seen</label>
            @date("pd_last_seen")
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
            @select("Occupation Status", "occupation_status", [
                0 => "Working",
                1 => "Retired",
                2 => "Disabled"
            ])
        </div>
        <div class="form-group col-md-5">
            <label>Occupation Description</label>
            @text("occupation_description")
        </div>
        <div class="col-md-4 form-group">
            <!--<yes-no name="military">Have you ever served in the Military?</yes-no>-->
            <label>Have you ever served in the Military?</label>
            @select("Military served status", "military", [
                0 => "Yes",
                1 => "No",
                2 => "Unknown"
            ], [ "id" => "military" ])
        </div>
    </div>
@endif