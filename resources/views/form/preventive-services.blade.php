@header("Medicare Part B Preventive Services")
<div class="row">
	@foreach(config("form.section.preventive_services") as $recommendation)
		<div class="form-group col-12">
			@if(isset($form))
				<label>
					<input type="checkbox" {{ $form[$recommendation] ? "checked" : "" }}>
					{{ ($loop->index + 1) }}. {{ __("form.preventive_services.$recommendation") }}
				</label>
			@else
				@checkbox(
					($loop->index + 1) . ". " . __("form.preventive_services.$recommendation"),
					$recommendation,
					toId($recommendation))
			@endif
		</div>
	@endforeach
</div>
