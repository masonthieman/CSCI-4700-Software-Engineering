@header("Discharge")
@if (isset($form))
	<div class="row">
		<div class="col-md-4 printing-col">
			<label for="">Discharge Date:</label>
			<span class="printing-span">{{dateValuePrint($form->discharge_date)}}</span>
		</div>
		<div class="col-md-4 printing-col">
			@printradio($form->discharge_instruct, "Discharge Summary")
		</div>
		<div class="col-md-4 printing-col">
			<label for="">Discharge Instructions Received:</label>
			<span class="printing-span">{{dateValuePrint($form->requested)}}</span>
		</div>
		<div class="col-md-4 printing-col">
			<label for="">Follow Up Date:</label>
			<span class="printing-span">{{dateValuePrint($form->followUpDate)}}</span>
		</div>
		<div class="printing-col col-md-8">
			<label for="">Discharged To:</label>
			<span class="printing-span">
				@if(isset($form->discharged_to))
				    {{config("form.discharged_to")[$form->discharged_to]}}
			    @endif
			</span>
		</div>
	</div>
	
	@foreach($form->discharge_icds as $discharge_icd)
		<div class="row">
			<div class="col-md-12 printing-col">
				<label for="">Occupant:</label>
				<span class="printing-span">{{$discharge_icd->occupant}}</span>
			</div>
		</div>
	@endforeach

	<div class="row">
        <div class="col-sm-4 printing-col">
			@printradio($form->dis_summary_reviewed, "Discharge Summary Reviewed")
        </div>
		<div class="printing-col col-sm-4">
			<label for="">Discharge Summary Requested:</label>
			<span class="printing-span">{{dateValuePrint($form->dischargeRequest)}}</span>
		</div>
		<div class="printing-col col-4">
			<label for="">Comment:</label>
			<span class="printing-span">{{$form->dischargeComment}}</span>
		</div>
	</div>
@else
	<div class="row">
		<div class="col-md-3 form-group">
			<label for="">Discharge Date</label>
			@date("discharge_date", ["id" => "discharge_date"])
		</div>
		<div class="col-md-4 form-group">
			<yes-no name="discharge_instruct">Discharge Summary</yes-no>
		</div>
		<div class="col-md-5 form-group">
			<label for="">Discharge Instructions Received</label>
			@date("requested", ["id" => "requested"])
		</div>
		<div class="col-md-6 form-group">
			<label for="">Follow Up Date</label>
			@date("followUpDate", ["id" => "followUpDate"])
		</div>
		<div class="form-group col-md-6">
			<label>Discharged To</label>
			@select("Discharged To", "discharged_to", [
                "home" => "Home",
                "family_member_home" => "Family Member Home",
                "non_family_member_home" => "Non-family member home",
                "assisted_living" => "Assisted Living",
                "rest_foster_home" => "Rest/Foster Home",
                "hospice" => "Hospice- TCM is N/A",
                "snf" => "SNF- TCM is N/A",
                "rehab" => "Rehab- TCM N/A",
                "other" => "Other-Not Qualified"
            ], ["id" => "discharged-to"])
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-12">
			@dynamicarea("discharge_icds", "discharge_icds", "Discharge ICD-10")
			@push("dynamic_templates")
				@include("component.tcm-dynamic-templates.discharge-icds")
			@endpush
		</div>
	</div>

	<div class="row">
        <div class="col-md-3 form-group">
            <yes-no name="dis_summary_reviewed">Discharge Summary Reviewed</yes-no>
        </div>
		<div class="form-group col-md-3">
			<label for="">Discharge Summary Requested</label>
			@date("dischargeRequest", ["id" => "dischargeRequest"])
		</div>
		<div class="form-group col-md-6">
			<label for="dischargeComment">Comment</label>
			@text("dischargeComment", ["id" => "dischargeComment"])
		</div>
	</div>
@endif