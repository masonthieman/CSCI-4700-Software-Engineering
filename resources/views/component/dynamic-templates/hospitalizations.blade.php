<div data-dynamic-template-id="hospitalizations" class="row dynamic-form">
	<div class="form-group col-lg-3">
		<label>Date</label>
		<!-- @month('date') 
		@date('date')-->
		@text("date", ["data-feedback" => "date-feedback", "placeholder"=>"MM/YYYY", "class"=>"dateFormat" ])
	</div>
	<div class="form-group col-lg-4">
		<label>Reason</label>
		@text('reason')
	</div>
	<div class="form-group col-lg-3">
		<label>Hospital</label>
		@text('hospital')
	</div>
	<div class="form-group col-lg-2 align-self-end">
		<button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
	</div>
</div>
