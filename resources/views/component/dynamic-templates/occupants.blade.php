 <div data-dynamic-template-id="occupants" class="row dynamic-form">
	<div class="form-group col-md-12">
		<label >Occupant</label>
		<div class="input-group mb-1">
			@text("name", ["data-feedback" => "people-feedback"])
			<div class="input-group-append">
				<button class="btn btn-outline-primary" data-dynamic-action="remove" type="button">Remove</button>
			</div>
		</div>
		<div data-feedback-area="people-feedback" class="invalid-feedback visible"></div>
	</div>
</div>
