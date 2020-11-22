@header("Medication List")
@if (isset($form))
	<div class="row">
		<div class="col-12 text-center">
			<p>List all medications - prescribed and over-the-counter, such as vitamins and inhalers</p>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-md-6">
			<label>Pharmacy Name:</label>
			<span class="printing-span">{{$form->pharmacy_name}}</span>
		</div>
		<div class="printing-col col-md-6">
			<label>Pharmacy Phone Number:</label>
			<span class="printing-span">{{$form->pharmacy_number}}</span>
		</div>
	</div>
	@foreach($form->medications as $medication)
		<div class="row">
			<div class="col-md-4">
				<span class="printing-span">{{$medication->name}} </span>
			</div>
			<div class="col-md-4">
				<span class="printing-span">{{$medication->strength}}</span>
			</div>
			<div class="col-md-4">
				<span class="printing-span">
					@if(array_key_exists( $medication->frequency, config("form.medical_abbreviations" ))) 
				        {{config("form.medical_abbreviations")[$medication->frequency]}}
					@endif
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<label>Name</label>
			</div>
			<div class="col-md-4">
				<label>Strength</label>
			</div>
			<div class="col-md-4">
				<label>Frequency</label>
			</div>
		</div>
	@endforeach
@else
	<div class="row">
		<div class="col-12 text-center">
			<p>List all medications - prescribed and over-the-counter, such as vitamins and inhalers</p>
		</div>
	</div>
	@unless(isset($hide_pharmacy))
		<div class="row">
			<div class="form-group col-md-6">
				<label>Pharmacy Name</label>
				@text("pharmacy_name")
			</div>
			<div class="form-group col-md-6">
				<label>Pharmacy Phone Number</label>
				@phone("pharmacy_number")
			</div>
		</div>
	@endunless
	@dynamicarea("medications", "medications", "Medication")
	@push("dynamic_templates")
		@include("component.dynamic-templates.medications")
	@endpush
@endif
