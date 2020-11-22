@header("Depression Medication")
<div class="row">
	<div class="col-12 text-center">
		<p>Select depression medications used previously or taking now</p>
	</div>
</div>
@if (isset($form))
	<div class="row">
		@foreach (config("form.section.depression_medication") as $medication)
			<div class="form-check col-md-3 form-group">
				@printcheckbox($form->$medication, __("form.depression_medication.$medication"))
			</div>
		@endforeach
	</div>
	@foreach($form->depressionMedications as $med)
        <div class="row">
            <div class="col-12 printing-col">
                <label>Medication:</label>
                <span class="printing-span">{{$med->medication}}</span>
            </div>
        </div>
    @endforeach
@else
	<div class="row">
		@foreach (config("form.section.depression_medication") as $medication)
			<div class="form-check col-md-3 form-group">
				@checkbox(__("form.depression_medication.$medication"), $medication, toId($medication))
			</div>
		@endforeach
	</div>
	@dynamicarea("depression_medications", "depression_medications", "Depression Medication")
	@push("dynamic_templates")
		@include("component.dynamic-templates.depression-medications")
	@endpush
@endif