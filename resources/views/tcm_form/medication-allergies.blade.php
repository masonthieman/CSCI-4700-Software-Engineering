@header("Medication Allergies")
@if (isset($form))
	<div class="row">
		<div class="col-12 printing-col">
			@printcheckbox($form->med_recon_no_drug_allergy, "No Known Drug Allergy")
		</div>
	</div>
	@foreach($form->med_recon_medication_allergies as $allergy)
		<div class="row">
		    <div class="printing-col col-md-6">
				<label for="">Drug Name:</label>
				<span class="printing-span">{{$allergy->med_recon_medication_allergy_drug_name}}</span>
			</div>
			<div class="printing-col col-md-6">
				<label for="">Reaction:</label>
				<span class="printing-span">{{$allergy->med_recon_medication_allergy_reaction}}</span>
			</div>
		</div>
	@endforeach
@else
	<div class="row">
		<div class="form-group col-md-12">
			@checkbox("No Known Drug Allergy", "med_recon_no_drug_allergy", "no_drug_allergy")
			<div class="invalid-feedback" id="nkda_error"></div>
		</div>
	</div>
	<div class="form-group">
		@dynamicarea("med_recon_medication_allergies", "med_recon_medication_allergies", "Medication Allergies")
		@push("dynamic_templates")
			@include("component.tcm-dynamic-templates.med-recon-medication-allergy")
		@endpush
	</div>
@endif