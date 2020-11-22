<div data-dynamic-template-id="discharge_icds" class="row dynamic-form">
{{--<div class="col-md-5 form-group">
		<label for="">Discharge Date</label>
		@date("discharge_date", ["id" => "discharge_date"])
	</div>
	<div class="col-md-2 form-group">
		<yes-no name="discharge_instruct">Discharge Instruction</yes-no>
	</div>
	<div class="col-md-5 form-group">
		<label for="">Requested</label>
		@date("requested", ["id" => "requested"])
	</div>
	<div class="col-md-6 form-group">
		<label for="">Follow Up Date</label>
		@date("followUpDate", ["id" => "followUpDate"])
	</div>
	<div class="form-group col-md-6">
		<label>Discharged To</label>
		@selectdischargedto("discharged_to", request()->input("discharged_to"))
	</div>--}}
	
	<div class="form-group col-md-6">
		<label>Occupant</label>
		@text("occupant", ["id" => "occupant"])
	</div>
	<div class="col-md-2 form-group align-self-end">
		<button class="btn btn-block btn-outline-primary" data-dynamic-action="remove" type="button">Remove</button>
	</div>
</div>