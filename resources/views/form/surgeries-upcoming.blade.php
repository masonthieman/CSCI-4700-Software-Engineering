@header("Upcoming Surgeries")
<div class="row">
	<div class="col-12 text-center">
		<p>List any upcoming surgeries within 90 days</p>
	</div>
</div>
@if(isset($form))
	<div class="row">
		<div class="col-12 printing-col">
			@printcheckbox($form->pending_upcoming_surgeries, "Pending Surgery")
		</div>
	</div>
	@foreach ($form->upcomingSurgeries as $surgery)
		<div class="row">
			<div class="printing-col col-6">
				<label>Surgery Type:</label>
				<span class="printing-span">{{ $surgery->type }}</span>
			</div>
			<div class="printing-col col-6">
				<label>Surgeon/Physician:</label>
				<span class="printing-span">{{ $surgery->surgeon }}</span>
			</div>
			<div class="printing-col col-6">
				<label>Location:</label>
				<span class="printing-span">{{ $surgery->location }}</span>
			</div>
			<div class="printing-col col-6">
				<label>Date:</label>
				<span class="printing-span">{{ monthValue($surgery->date) }}</span>
			</div>
		</div>
	@endforeach
@else
	<div class="row">
		<div class="form-group col-md-12">
			@checkbox("Pending Surgery", "pending_upcoming_surgeries", "pending_upcoming_surgeries")
		</div>
	</div>
	@dynamicarea("upcoming_surgeries", "upcoming_surgeries", "Surgery")
	@push("dynamic_templates")
	    @include("component.dynamic-templates.upcoming-surgeries")
	@endpush
@endif
