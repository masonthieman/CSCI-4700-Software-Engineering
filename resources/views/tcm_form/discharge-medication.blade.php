@header("Medication List")
@if (isset($form))
	@foreach($form->tcm_med_recon_discharge_medications as $medication)
		<div class="row">
			<div class="printing-col col-md-3">
				<label for="">Type:</label>
			    <span class="printing-span">@if(isset($medication->med_recon_discharge_medications_type))
		            {{config("form.med_recon_discharge_medications_type")[$medication->med_recon_discharge_medications_type]}}
		        @endif</span>
			</div>
			<div class="printing-col col-md-3">
				<label for="">Drug Name:</label>
				<span class="printing-span">{{$medication->med_recon_discharge_medication_drug_name}}</span>
			</div>
			<div class="printing-col col-md-3">
				<label for="">Dose:</label>
				<span class="printing-span">{{$medication->med_recon_discharge_medication_dose}}</span>
			</div>
			<div class="printing-col col-md-3">
				<label for="">Frequency:</label>
				<span class="printing-span">
					@if(array_key_exists($medication->med_recon_discharge_medication_frequency, config("form.medical_abbreviations" ))) 
				        {{config("form.medical_abbreviations")[$medication->med_recon_discharge_medication_frequency]}}
					@endif
				</span>
			</div>
		</div>
	@endforeach
@else
	<div class="form-group">
		@dynamicarea("tcm_med_recon_discharge_medications", "tcm_med_recon_discharge_medications", "Discharge Medications")
		@push("dynamic_templates")
			@include("component.tcm-dynamic-templates.tcm-med-recon-discharge-medications")
		@endpush
	</div>
    
@endif