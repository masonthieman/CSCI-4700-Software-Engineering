@header("Office History")
@if (isset($form))
	<div class="row">
		<div class="col-6 printing-col">
			@printradio($form->prior_visit, "Office Visit within last 3 years")
		</div>
		<div class="col-6 printing-col">
			<label for="">Date of Last Office Visit:</label>
            <span class="printing-span">{{dateValuePrint($form->lastVisit)}}</span>
		</div>
	</div>
@else
	<div class="row">
		<div class="col-4 offset-md-2 form-group">
            <yes-no name="prior_visit">Office Visit within last 3 years</yes-no>
		</div>
		<div class="col-4 form-group">
				<label for="">Date of Last Office Visit</label>
				@date("lastVisit", ["id" => "lastVisit"])
		</div>
	</div>
@endif