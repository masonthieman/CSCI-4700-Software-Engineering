<div data-dynamic-template-id="depression_medications" class="row dynamic-form">
	<div class="form-group col-md-12">
		<label >Medication</label>
		<div class="input-group mb-1">
			@text("medication", ["data-feedback" => "medication-feedback"])
			<div class="input-group-append">
				<button class="btn btn-outline-primary" data-dynamic-action="remove" type="button">Remove</button>
			</div>
		</div>
		<div data-feedback-area="medication-feedback" class="invalid-feedback visible"></div>
	</div>
</div>
