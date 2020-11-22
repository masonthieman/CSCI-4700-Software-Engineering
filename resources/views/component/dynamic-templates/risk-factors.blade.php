<div data-dynamic-template-id="risk_factors" class="row dynamic-form">
	<div class="form-group col-12">
		<div class="input-group mb-1">
		@text('risk_factor', ["data-feedback" => "risk-factor-feedback"])
			<div class="input-group-append">
				<button class="btn btn-outline-primary" data-dynamic-action="remove" type="button">Remove</button>
			</div>
		</div>
		<div class="invalid-feedback visible" data-feedback-area="risk-factor-feedback"></div>
	</div>
</div>
