<div data-dynamic-template-id="caregivers" class="row dynamic-form">
	<div class="form-group col-md-4">
		<label>Caregiver Name</label>
		@text('name', ["data-feedback" => "name-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="name-feedback"></div>
	</div>
	<div class="form-group col-md-3">
		<label>Relationship</label>
		@text('relationship', ["data-feedback" => "relationship-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="relationship-feedback"></div>
	</div>
	<div class="form-group col-md-3">
		<label>Phone Number</label>
		@phone('phone', ["data-feedback" => "phone-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="phone-feedback"></div>
	</div>
	<div class="form-group col-md-2 align-self-end">
		<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
		<div data-feedback-area="" class="invalid-feedback visible"></div>
	</div>
</div>
