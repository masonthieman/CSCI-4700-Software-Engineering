@header("List Any Caregiver(s)")
@if (isset($form))
	@foreach($form->careGivers as $caregiver)
        <div class="row">
            <div class="col-md-4">
				<label>Name:</label>
                <span class="printing-span">{{$caregiver->name}}</span>
            </div>
            <div class="col-md-4">
				<label>Relationship:</label>
				<span class="printing-span">{{$caregiver->relationship}}</span>
			</div>
			<div class="col-md-4">
				<label>Phone Number:</label>
                <span class="printing-span">{{$caregiver->number}}</span>
            </div>
		</div>
	@endforeach
@else
	@dynamicarea("caregivers", "caregivers", "Caregiver")
	@push("dynamic_templates")
		@include("component.dynamic-templates.caregivers")
	@endpush
@endif
