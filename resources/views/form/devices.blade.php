@header("Devices")
<div class="row">
	@if (isset($form))
		@foreach(config("form.section.devices") as $device)
			<div class="printing-col col-3">
				@printcheckbox($form->$device, __("form.devices.$device"))
			</div>
		@endforeach
	@else
		@foreach(config("form.section.devices") as $device)
			<div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-6">
				@checkbox(__("form.devices.$device"), $device, toId($device))
			</div>
		@endforeach
	@endif
</div>
