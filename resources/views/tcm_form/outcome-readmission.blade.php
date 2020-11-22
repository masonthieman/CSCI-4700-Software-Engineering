@header("Readmission")
@if(isset($form))
	<div class="row">  
		<div class="printing-col col-md-6">
			<label for="outcome_readmission_date">Date</label>
			<span class="printing-span">{{dateValuePrint($form->outcome_readmission_date)}}</span>
		</div>
		<div class="printing-col col-md-6">
			<label for="outcome_readmission_location">Location</label>
			<span class="printing-span">{{$form->outcome_readmission_location}}</span>
		</div>
	</div>
	@foreach($form->tcm_outcome_icds as $tcm_outcome_icd)
		<div class="row">
			<div class="col-md-12 printing-col">
				<label for="">Occupant:</label>
				<span class="printing-span">{{$tcm_outcome_icd->outcome_icd_10}}</span>
			</div>
		</div>
	@endforeach
@else
	<div class="row">  
		<div class="form-group col-md-6">
			<label for="outcome_readmission_date">Date</label>
			@date("outcome_readmission_date",["id"=>"outcome-readmission-date"]) 
		</div>
		<div class="form_group col-md-6">
			<label for="outcome_readmission_location">Location</label>
			@text("outcome_readmission_location", ["id" => "outcome-readmission-location"])
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			@dynamicarea("tcm_outcome_icds", "tcm_outcome_icds", "ICD-10")
			@push("dynamic_templates")
				@include("component.tcm-dynamic-templates.tcm-outcome-icd")
			@endpush
		</div>
	</div>
@endif