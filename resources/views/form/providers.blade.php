@header("Providers")
@if (isset($form))
	@foreach($form->providers as $provider)
		<div class="row">
			<div class="col-3 printing-col">
				<label>Name:</label>
				<span class="printing-span">{{$provider->name}}</span>
			</div>
			<div class="col-3 printing-col">
				<label>Specialty:</label>
				<span class="printing-span">{{$provider->specialty}}</span>
			</div>
			<div class="col-3 printing-col">
				<label>Phone Number:</label>
				<span class="printing-span">{{$provider->number}}</span>
			</div>
			<div class="col-3 printing-col">
				<label>Last Office Visit:</label>
				<span class="printing-span">
				    @if (isset($provider->last_office_visit) && !empty($provider->last_office_visit))
					    {{monthValue($provider->last_office_visit)}}
					@else
						Date Unknown
					@endif
				</span>
			</div>
		</div>
	@endforeach
@else
	@dynamicarea("providers", "providers", "Provider")
	@push("dynamic_templates")
		@include("component.dynamic-templates.providers")
	@endpush
@endif
