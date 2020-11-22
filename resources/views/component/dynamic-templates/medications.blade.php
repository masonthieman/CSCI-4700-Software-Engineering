<div data-dynamic-template-id="medications" class="row dynamic-form">
	<div class="form-group col-md-4">
		<label>Name of the Drug</label>
		@text('name', ["data-feedback" => "name-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="name-feedback"></div>
	</div>
	<div class="form-group col-md-3">
		<label>Strength</label>
		@text('strength', ["data-feedback" => "strength-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="strength-feedback"></div>
	</div>
	<div class="form-group col-md-3">
		<label>Frequency Taken</label>
		@selectmedabbrev('frequency', ["data-feedback" => "frequency-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="frequency-feedback"></div>
	</div>
	<div class="form-group col-md-2 align-self-end">
		<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
		<div data-feedback-area="" class="invalid-feedback visible"></div>
	</div>
</div>
