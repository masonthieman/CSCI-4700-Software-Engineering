<div data-dynamic-template-id="allergies" class="row dynamic-form">
	<div class="form-group col-md-4">
		<label>Name of the drug</label>
		@text('name', ["data-feedback" => "name-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="name-feedback"></div>
	</div>
	<div class="form-group col-md-6">
		<label>Reaction you had</label>
		@text('reaction', ["data-feedback" => "reaction-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="reaction-feedback"></div>
	</div>
	<div class="form-group col-md-2 align-self-end">
		<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
		<div data-feedback-area="" class="invalid-feedback visible"></div>
	</div>
</div>
