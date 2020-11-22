<div data-dynamic-template-id="medical_problems" class="row dynamic-form align-items-end">
	<div class="form-group col-12">
		<label>Condition</label>
		<div class="input-group">
			@text('name', ['data-feedback' => 'name-feedback'])
			<div class="input-group-append">
				<button class="btn btn-outline-primary" data-dynamic-action="remove" type="button">Remove</button>
			</div>
		</div>
		<div class="invalid-feedback visible" data-feedback-area="hospital-feedback"></div>
	</div>
</div>
