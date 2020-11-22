<div data-dynamic-template-id="med_recon_medication_allergies" class="row dynamic-form">
	<div class="form-group col-md-5">
		<label for="">Drug Name</label>
		@text('med_recon_medication_allergy_drug_name', ["id" => "med_recon_medication_allergy_drug_name"])
	</div>
	<div class="form group col-md-5">
		<label for="">Reaction</label>
		@text('med_recon_medication_allergy_reaction', ["id" => "med_recon_medication_allergy_reaction"])
	</div>
	<div class="form-group col-md-2 align-self-end">
		<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
	</div>
</div>