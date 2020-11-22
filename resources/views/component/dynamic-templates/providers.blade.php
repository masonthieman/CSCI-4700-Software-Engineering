<div data-dynamic-template-id="providers" class="row dynamic-form">
	<div class="form-group col-lg-3">
		<label>Name</label>
		@text('name', ['data-feedback' => 'name-feedback'])
		<div class="invalid-feedback visible" data-feedback-area="name-feedback"></div>
	</div>
	<div class="form-group col-lg-3">
		<label>Specialty</label>
		@text('specialty', ['data-feedback' => 'specialty-feedback'])
		<div class="invalid-feedback visible" data-feedback-area="specialty-feedback"></div>
	</div>
	<div class="form-group col-lg-3">
		<label>Phone Number</label>
		@phone('number', ['data-feedback' => 'number-feedback'])
		<div class="invalid-feedback visible" data-feedback-area="number-feedback"></div>
	</div>
	<div class="form-group col-lg-3">
		<label>Last Office Visit</label>
		<!-- @date('office_visit', ['office_visit' => 'office_visit-feedback'])-->
		@text("office_visit", ["office_visit" => "office_visit-feedback", "placeholder"=>"MM/YYYY", "class"=>"dateFormat" ])
		@checkbox("Unknown Date", "office_visit_date_unknown", "office-visit-date-unknown")
		<div class="invalid-feedback visible" data-feedback-area="office_visit-feedback"></div>
	</div>
	<div class="form-group col-lg-12 align-self-end text-right">
		<button class="btn btn-outline-primary" type="button" data-dynamic-action="remove">Remove</button>
		<div data-feedback-area="" class="invalid-feedback visible"></div>

	</div>
</div>
