@header("ADL's")
<div class="row">
	@if(isset($form))
		@foreach(config("form.section.adl") as $adl)
			<div class="printing-col col-md-4">
				@printradio($form[$adl], __("form.adl.$adl"))
			</div>
		@endforeach
	@else
		@foreach (config("form.section.adl") as $adl)
			<div class="form-group col-md-4">
				<yes-no name="{{ $adl }}">{{ __("form.adl.$adl") }}</yes-no>
			</div>
		@endforeach
	@endif
</div>
