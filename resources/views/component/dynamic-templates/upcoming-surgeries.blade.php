<div data-dynamic-template-id="upcoming_surgeries" class="row dynamic-form">
	<div class="form-group col-md-6">
		<label>Surgery Type</label>
		@text("type")
	</div>
	<div class="form-group col-md-6">
		<label>Surgeon/Physician</label>
		@text("surgeon")
	</div>
	<div class="form-group col-md-6">
		<label>Location</label>
		@text("location")
	</div>
	<div class="form-group col-md-4">
		<label>Date</label>
		<!-- @month("date") 
		@date("date")-->
		@text("date", ["data-feedback" => "date-feedback", "placeholder"=>"MM/YYYY", "class"=>"dateFormat" ])
	</div>
	<div class="col-md-2 form-group align-self-end">
		<button class="btn btn-block btn-outline-primary" data-dynamic-action="remove" type="button">Remove</button>
	</div>
</div>
