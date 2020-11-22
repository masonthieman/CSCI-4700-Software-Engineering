<div data-dynamic-template-id="tcm_med_recon_pharmacies" class="row dynamic-form">
	<div class="form-group col-md-4">
		<label for="">Pharmacy Name</label>
		@text('med_recon_pharmacy_name', ["id" => "med_recon_pharmacy_name"])
	</div>
	<div class="form group col-md-3">
		<label for="">Phone:</label>
		@phone('med_recon_pharmacy_phone', ["id" => "med_recon_pharmacy_phone"])
	</div>
	<div class="form group col-md-3">
		<label for="">Fax:</label>
		@phone('med_recon_pharmacy_fax', ["id" => "med_recon_pharmacy_fax"])
	</div>
	<div class="form-group col-md-2 align-self-end">
		<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
	</div>
</div>