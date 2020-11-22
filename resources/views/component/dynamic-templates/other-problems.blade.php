<div data-dynamic-template-id="other_problems" class="row dynamic-form">
	<div class="form-group col-md-12">
		<label >Problem</label>
		<div class="input-group mb-1">
			@text("value", ["data-feedback" => "otherproblem-feedback"])
			<div class="input-group-append">
				<button class="btn btn-outline-primary" data-dynamic-action="remove" type="button">Remove</button>
			</div>
		</div>
		<div data-feedback-area="otherproblem-feedback" class="invalid-feedback visible"></div>
	</div>
</div>
