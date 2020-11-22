@header("Other Hospitalizations")
@if (isset($form))
	@foreach($form->hospitalizations as $hospitalization)
		<div class="row">
			<div class="col-2 printing-col">
				<label>Date:</label>
				<span class="printing-span">{{monthValue($hospitalization->date)}}</span>
			</div>
			<div class="col-5 printing-col">
				<label>Reason:</label>
				<span class="printing-span">{{$hospitalization->reason}}</span>
			</div>
			<div class="col-5 printing-col">
				<label>Hospital:</label>
				<span class="printing-span">{{$hospitalization->hospital}}</span>
			</div>
		</div>
	@endforeach
@else
	@dynamicarea("hospitalizations", "hospitalizations", "Hospitalization")
	@push("dynamic_templates")
		@include("component.dynamic-templates.hospitalizations")
	@endpush
@endif
