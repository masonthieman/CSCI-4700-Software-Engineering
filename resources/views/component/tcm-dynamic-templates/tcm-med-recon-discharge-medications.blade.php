<div data-dynamic-template-id="tcm_med_recon_discharge_medications" class="row dynamic-form">
	<div class="form-group col-md-2">
		<label for="">Type:</label>
		@select("Type", "med_recon_discharge_medications_type",[
		 0 => "New",
		 1 => "Existing",
		 ])
	</div>
	<div class="form-group col-md-2">
		<label for="">Drug Name:</label>
		@text('med_recon_discharge_medication_drug_name', ["id" => "med_recon_discharge_medication_drug_name"])
	</div>
	<div class="form-group col-md-2">
		<label for="">Dose:</label>
		@text('med_recon_discharge_medication_dose', ["id" => "med_recon_discharge_medication_dose"])
	</div>
	<div class="form-group col-md-3">
		<label>Frequency Taken</label>
		@selectmedabbrev('med_recon_discharge_medication_frequency', ["id" => "med_recon_discharge_medication_frequency","data-feedback" => "frequency-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="frequency-feedback"></div>
	</div>
	<!-- <div class="form-group col-md-2">
		<label for="">Frequency:</label>
		@text('med_recon_discharge_medication_frequency', ["id" => "med_recon_discharge_medication_frequency"])
	</div> -->
	<div class="form-group col-md-2 align-self-end">
		<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
	</div>
</div>