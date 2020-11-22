<div data-dynamic-template-id="surgeries" class="row dynamic-form">
	<div class="form-group col-md-3">
		<label>Date</label>
		<!-- @date('date', ['data-feedback' => 'date-feedback']) -->
		@text("date", ["data-feedback" => "date-feedback", "placeholder"=>"MM/YYYY", "class"=>"dateFormat" ])
		<!-- @month('date', ['data-feedback' => 'date-feedback']) -->
		@checkbox("Unknown Date", "surgery_date_unknown", "surgery-date-unknown")
		<div data-feedback-area="date-feedback" class="invalid-feedback visible"></div>
	</div>
	<div class="form-group col-md-4">
		<label>Reason</label>
		@text('reason', ['data-feedback' => 'reason-feedback'])
		<div data-feedback-area="reason-feedback" class="invalid-feedback visible"></div>
	</div>
	<div class="form-group col-md-3">
		<label>Hospital</label>
		@text('hospital', ['data-feedback' => 'hospital-feedback'])
		@checkbox("Unknown Hospital", "surgery_hospital_unknown", "surgery-hospital-unknown")
		<div data-feedback-area="hospital-feedback" class="invalid-feedback visible"></div>
	</div>
	<div class="form-group col-md-2 align-self-end" style="top:-24px;">
		<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
		<div data-feedback-area="" class="invalid-feedback visible"></div>
	</div>
</div>
