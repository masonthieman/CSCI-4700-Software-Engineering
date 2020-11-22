<div data-dynamic-template-id="chronic_conditions" class="row dynamic-form">
	<div class="form-group col-md-3">
		<label>ICD-10</label>
		@text('icd10', ["data-feedback" => "chronic-condition-icd10-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="chronic-condition-icd10-feedback"></div>
	</div>
	<div class="form-group col-md-7">
		<label>Condition Description</label>
		@text('description', ["data-feedback" => "chronic-condition-description-feedback"])
		<div class="invalid-feedback visible" data-feedback-area="chronic-condition-description-feedback"></div>
	</div>
	<div class="form-group col-md-2 align-self-end">
		<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
		<div data-feedback-area="" class="invalid-feedback visible"></div>
	</div>
</div>
