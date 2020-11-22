<div data-dynamic-template-id="tcm_med_recon_prior_medication_changes" class="dynamic-form">
	<div class="row">
		<div class="form-group col-md-2">
			<label for="">Type</label>
			@select("Type", "med_recon_medication_changes_type", [
				0 => "Discontinued",
				1 => "Discrepency",
			])
			<div data-feedback-area="med_recon_medication_changes_type-feedback" class="invalid-feedback visible"></div>
		</div>
		<div class="form-group col-md-2">
			<label for="">Drug Name</label>
			@text('med_recon_medication_changes_drug_name', ["data-feedback" => "med_recon_medication_changes_drug_name-feedback"])
			<div data-feedback-area="med_recon_medication_changes_drug_name-feedback" class="invalid-feedback visible"></div>
		</div>
		<div class="form group col-md-2">
			<label for="">Dose</label>
			@text('med_recon_medication_changes_dose', ["data-feedback" => "med_recon_medication_changes_dose-feedback"])
			<div data-feedback-area="med_recon_medication_changes_dose" class="invalid-feedback visible"></div>
		</div>
		<div class="form group col-md-2">
			<label for="">Frequency</label>
			@text('med_recon_medication_changes_frequency', ["data-feedback" => "med_recon_medication_changes_frequency-feedback"])
			<div data-feedback-area="med_recon_medication_changes_frequency" class="invalid-feedback visible"></div>
		</div>
		<div class="form-group col-md-2 align-self-end">
			<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
		</div>
	</div>
</div>