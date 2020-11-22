@header("Admissions")
@if (isset($form))
	<div class="row">
        <div class="printing-col col-md-6">
            <label>Admission Date:</label>
            <span class="printing-span">{{dateValuePrint($form->adDate)}}</span>
        </div>
		<div class="printing-col col-6">
			<label>Hospital Name:</label>
			<span class="printing-span">{{$form->hName}}</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-md-6">
			<label>Admission Facility Type:</label>
			<span class="printing-span">
				@if(!empty($form->admission_facility_type))
				    {{config("form.admission_facility_type")[$form->admission_facility_type]}}
			    @endif
			</span>
		</div>
		<div class="printing-col col-md-6">
			<label>Admitted From:</label>
			<span class="printing-span">
				@if(!empty($form->admitted_form))
				    {{config("form.admitted_form")[$form->admitted_form]}}
			    @endif
			</span>
		</div>
	</div>
@else
    <div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="">Admission Date</label>	
				@date("adDate", ["id" => "adDate"])
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="Hospital Name">Hospital Name</label>
				@text("hName", ["id" => "hName"])
			</div>
		</div>
	</div>
	<div class="row">
        <div class="form-group col-md-6">
            <label>Admission Facility Type</label>
<!-- 			@selectadmissionfacilitytype("admission_facility_type", request()->input("admission_facility_type"))-->
			@select("Admission Facility Type", "admission_facility_type", [
                "ac_inpatient" => "AC Inpatient",
                "ac_observation" => "AC Observation",
                "ac_op_partial_hosp" => "AC OP Partial Hosp",
                "rehab_hospital" => "Rehab Hospital",
                "ltac_snf" => "LTAC- SNF",
                "mental_health_partial_hosp" => "Mental Health Partial Hosp",
                "other" => "Other",
            ], ["id" => "admission-facility-type"])
        </div>
        <div class="form-group col-md-6">
            <label>Admitted From</label>
			@select("Admitted From", "admitted_form", [
                "direct_admission" => "Direct Admission",
                "through_ed" => "Through ED",
                "readmit_thirty" => "Re-admission w/in 30 days",
                "snf" => "SNF",
                "mental_health_facility" => "Mental Health Facility",
                "other" => "Other-Not Qualified",
                "unknown" => "Unknown",
            ], ["id" => "admitted-form"])
        </div>
	</div>
@endif