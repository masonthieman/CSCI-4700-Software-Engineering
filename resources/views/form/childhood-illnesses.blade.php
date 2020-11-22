@header("Childhood Illnesses")
<div class="row">
	@if(isset($form))
		@foreach(config("form.section.childhood_illnesses") as $illness)
			<div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-6">
				<label>
					<input type="checkbox" {{ $form[$illness] ? "checked" : "" }}>
					{{ __("form.childhood_illnesses.$illness") }}
				</label>
			</div>
		@endforeach
	@else
		@foreach(config("form.section.childhood_illnesses") as $illness)
			<div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-6">
				@checkbox(__("form.childhood_illnesses.$illness"), $illness, toId($illness))
			</div>
		@endforeach
	@endif
</div>
