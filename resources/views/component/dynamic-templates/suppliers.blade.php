<div data-dynamic-template-id="suppliers" class="row dynamic-form">
	<div class="form-group col-md-4">
		<label>Supplier Name</label>
		@text('name', ["data-feedback" => "name-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="name-feedback"></div>
	</div>
	<div class="form-group col-md-3">
		<label>Device</label>
		@text('device', ["data-feedback" => "device-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="device-feedback"></div>
	</div>
	<div class="form-group col-md-3">
		<label>Phone Number</label>
		@phone('number', ["data-feedback" => "number-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="number-feedback"></div>
	</div>
	<div class="form-group col-md-2 align-self-end">
		<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
		<div data-feedback-area="" class="invalid-feedback visible"></div>
	</div>
</div>
