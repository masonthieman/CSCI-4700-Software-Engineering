
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

@header("Demographics")
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="Last Name">Last Name</label>
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
<div class="row">
    <div class="col-md-3 col-lg-2 form-group">
        <label for="Gender">Gender</label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label for="gender-male" class="btn btn-outline-primary">
                @input("radio", "gender", ["autocomplete" => "off", "value" => "0", "id" => "gender-male", "data-feedback" => "gender-feedback"])
                Male
            </label>
            <label for="gender-female" class="btn btn-outline-primary">
                @input("radio", "gender", ["autocomplete" => "off", "value" => "1", "id" => "gender-female", "data-feedback" => "gender-feedback"])
                Female
            </label>
        </div>
        <div class="invalid-feedback visible" data-feedback-area="gender-feedback"></div>
    </div>
    <div class="col-9 col-md-7 col-lg-4">
        <div class="form-group">
            <label for="">DOB</label>
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
                <label class="btn btn-outline-primary" for="email">
                    @input("radio", "email", ["id" => "email-preferred", "value" => "2", "data-feedback" => "contact-preferred-feedback"])
                    Preferred
                </label>
            </div>
            @email("email", ["id" => "email"])
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Address 1</label>
            @text("addr1", ["id" => "addr1"])
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Address 2 (optional)</label>
            @text("addr2", ["id" => "addr2"])
        </div>
    </div>
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
                        @input("radio", "phone_primary", ["id" => "phone-primary-preferred", "value" => "0", "data-feedback" => "contact-preferred-feedback"])
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
                        @input("radio", "phone_secondary", ["id" => "phone-secondary-preferred", "value" => "1", "data-feedback" => "contact-preferred-feedback"])
                    </label>
                </div>
                @phone("phone_secondary")
            </div>
    </div>
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

@divider
<div class="row">
    <div class="col-md-12 text-center">
        <h3>Advanced Directives</h3>
    </div>
</div>
@include("component.power-of-attorney")
<div class="row">
    <div class="col-md-4 form-group">
        <label for="">Do you have a healthcare advance directive (living will)?</label>
        <div>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label for="living_will_yes" class="btn btn-outline-primary">
                    @input("radio", "living_will", ["autocomplete" => "off", "value" => "1","id" => "living_will_yes", "data-feedback" => "living_will-feedback"]) Yes
                </label>
                <label for="living_will_no" class="btn btn-outline-primary">
                    @input("radio", "living_will", ["autocomplete" => "off", "value" => "0", "id" => "living_will_no", "data-feedback" => "living_will-feedback"]) No
                </label>
            </div>
        </div>
        <div class="invalid-feedback visible" data-feedback-area="living_will-feedback"></div>
    </div>
    <div class="col-md-4 form-group">
        <label for="">Physician Orders for Life Sustaining Treatment (POLST)?</label>
        <div>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label for="polst-yes" class="btn btn-outline-primary">
                    @input("radio", "polst", ["autocomplete" => "off", "value" => "1", "id" => "polst-yes", "data-feedback" => "polst-feedback"]) Yes
                </label>
                <label for="polst-no" class="btn btn-outline-primary">
                    @input("radio", "polst", ["autocomplete" => "off", "value" => "0", "id" => "polst-no", "data-feedback" => "polst-feedback"]) No
                </label>
            </div>
        </div>
        <div class="invalid-feedback visible" data-feedback-area="polst-feedback"></div>
    </div>
    <div class="col-md-4 form-group">
        <label for="">Would you like information on the preparation of any of these?</label>
        <div>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label for="info_prep_requested-yes" class="btn btn-outline-primary">
                    @input("radio", "info_prep_requested", ["autocomplete" => "off", "value" => "1", "id" => "info_prep_requested-yes", "data-feedback" => "info_prep_requested-feedback"]) Yes
                </label>
                <label for="info_prep_requested-no" class="btn btn-outline-primary">
                    @input("radio", "info_prep_requested", ["autocomplete" => "off", "value" => "0", "id" => "info_prep_requested-no", "data-feedback" => "info_prep_requested-feedback"]) No
                </label>
            </div>
        </div>
        <div class="invalid-feedback visible" data-feedback-area="info_prep_requested-feedback"></div>
    </div>
</div>

@divider
@header("Best Time to Contact")
<contact-time></contact-time>
@divider


@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" disabled>Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="office_history" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>

