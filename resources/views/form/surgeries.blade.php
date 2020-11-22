@header("Surgeries")
@if (isset($form))
	@foreach($form->surgeries as $surgery)
		<div class="row">
			<div class="col-2 printing-col">
				<label>Date:</label>
				<span class="printing-span">
				    @if (isset($surgery->date) && !empty($surgery->date))
						{{monthValue($surgery->date)}}
					@else
						Date Unknown
					@endif
				</span>
			</div>
			<div class="col-5 printing-col">
				<label>Reason:</label>
				<span class="printing-span">{{$surgery->reason}}</span>
			</div>
			<div class="col-5 printing-col">
				<label>Hospital:</label>
				<span class="printing-span">
				    @if (isset($surgery->hospital) && !empty($surgery->hospital))
						{{$surgery->hospital}}
					@else
					    Hospital Unknown
					@endif
				</span>
			</div>
		</div>
	@endforeach
@else
	@dynamicarea("surgeries", "surgeries", "Surgery")
	@push("dynamic_templates")
	    @include("component.dynamic-templates.surgeries")
	@endpush
@endif
