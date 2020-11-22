@header("Routine Screenings")
<div class="row">
	@if (isset($form))
		@foreach (config("form.section.routine_screenings") as $screening)
			<div class="printing-col col-4">
                <label>
					<input type="checkbox" {{ $form->$screening ? "checked" : "" }}>
                    {{ __("form.routine_screenings.$screening") }}
                </label>
                <span class="printing-span">{{ monthValue($form[$screening . "_date"]) }}</span>
            </div>
		@endforeach
		@foreach (config("form.section.routine_screening_results") as $screening)
			<div class="printing-col col-12">
				<label>{{ __("form.routine_screenings.$screening") }} Results (If applicable)</label>
				<span class="printing-span">{{ $form[$screening . "_results"] }}</span>
			</div>
		@endforeach
	@else
		@foreach (config("form.section.routine_screenings") as $screening)
			<div class="form-group col-md-4 col-sm-6">
				@checkbox(__("form.routine_screenings.$screening"), $screening, toId($screening))
				<!-- @month("{$screening}_date", [ "id" => toId($screening) . "-date" ]) -->
				@text("{$screening}_date", [ "id" => toId($screening) . "-date", "placeholder"=>"MM/YYYY", "class"=>"dateFormat" ])
				<!-- @date("{$screening}_date", [ "id" => toId($screening) . "-date" ]) -->
			</div>
		@endforeach
		@foreach (config("form.section.routine_screening_results") as $screening)
			<div class="form-group col-12">
				<label>{{ __("form.routine_screenings.$screening") }} Results (If applicable)</label>
				@text("{$screening}_results")
			</div>
		@endforeach
	@endif
</div>
