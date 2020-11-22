@header("Immunizations and Dates")
<div class="row">
	@if (isset($form))
		@foreach (config("form.section.immunizations") as $immunization)
			<div class="form-group col-4 printing-col">
				@printcheckbox($form->$immunization, __("form.immunizations.$immunization"))
				@if ($form->{$immunization . "_date_unknown"})
					<span class="printing-span">Date Unknown</span>
				@else
					<span class="printing-span">{{ monthValue($form->{$immunization . "_date"}) }}</span>
				@endif
			</div>
		@endforeach
	@else
		@foreach (config("form.section.immunizations") as $immunization)
			<div class="form-group col-md-4 col-sm-6">
			<!-- <input class="datepicker" data-date-format="mm/dd/yyyy"> -->
				@checkbox(__("form.immunizations.$immunization"), $immunization, toId($immunization))
				<!-- @date("{$immunization}_date", ["id" => toId($immunization) . "-date"]) -->
				@text("{$immunization}_date", ["id" => toId($immunization) . "-date", "placeholder"=>"MM/YYYY", "class"=>"dateFormat"])
				<!-- @month("{$immunization}_date", ["id" => toId($immunization) . "-date"]) -->
				@checkbox("Unknown Date", "{$immunization}_date_unknown", toId($immunization) . "-date-unknown")
				<!--<div class="row">
					<div class="form-group col-md-4 col-sm-4">
					@number("dd", ["min"=>"1", "max"=>"31", "placeholder"=>"DD"])
					</div>
					<div class="form-group col-md-4 col-sm-4">
					@number("mm", ["min"=>"1", "max"=>"12", "placeholder"=>"MM"])
					</div>
					<div class="form-group col-md-4 col-sm-4">
					@number("yyyy", ["min"=>"1902", "max"=>"2999", "placeholder"=>"YYYY"])
					</div>
				</div>-->
				<!-- @date("{$immunization}_date", ["id" => toId($immunization) . "-date"]) -->
				
				<!-- @hidden("{$immunization}_hidden_date", ["id" => toId($immunization) . "-hidden-date"]) -->
			</div>
		@endforeach
	@endif
</div>