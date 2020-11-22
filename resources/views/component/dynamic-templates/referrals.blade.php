<div data-dynamic-template-id="referrals" class="row dynamic-form">
	<div class="form-group col-12">
		<label>Referral</label>
		<div class="input-group mb-1">
			@text("referral", ["data-feedback" => "referral-feedback"])
			<div class="input-group-append">
				<button class="btn btn-outline-primary" data-dynamic-action="remove" type="button" >Remove</button>
			</div>
		</div>
		<div class="invalid-feedback visible" data-feedback-area="referral-feedback"></div>
	</div>
</div>
