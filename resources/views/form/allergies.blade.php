@header("Allergies")
@if (isset($form))
	<div class="row">
		<div class="col-12 printing-col">
			@printcheckbox($form->allergies_nkda, "NDKA")
		</div>
	</div>
	@foreach($form->allergies as $allergy)
		<div class="row">
			<div class="col-md-6 printing-col">
				Drug name:
				<span class="printing-span">{{$allergy->name}}</span>
			</div>
			<div class="col-md-6 printing-col">
				Reaction:
				<span class="printing-span">{{$allergy->reaction}}</span>
			</div>
		</div>
	@endforeach
@else
	<div class="row">
		<div class="form-group col-md-12">
			@checkbox("NKDA", "allergies_nkda", "allergies_nkda")
			<div class="invalid-feedback" id="nkda_error"></div>
		</div>
	</div>
	@dynamicarea("allergies", "allergies", "Allergy")
	@push("dynamic_templates")
		@include("component.dynamic-templates.allergies")
	@endpush
@endif
