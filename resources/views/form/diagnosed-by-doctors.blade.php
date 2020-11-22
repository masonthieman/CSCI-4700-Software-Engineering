@header("Diagnosed by Doctors")
@if (isset($form))
	<div class="row">
		@foreach (config("form.section.diagnosed_by_doctors") as $diagnosis)
			<div class="printing-col col-3">
				@printcheckbox($form->$diagnosis, __("form.diagnosed_by_doctors.$diagnosis"))
			</div>
		@endforeach
		@foreach ($form->medicalProblems as $problem)
			<div class="printing-col col-12">
				<label>Other Problem Diagnosed:</label>
				<span class="printing-span">{{ $problem->name }}</span>
			</div>
		@endforeach
	</div>
@else
	<div class="row">
		@foreach (config("form.section.diagnosed_by_doctors") as $diagnosis)
			<div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-6">
				@checkbox(__("form.diagnosed_by_doctors.$diagnosis"), $diagnosis, toId($diagnosis))
			</div>
		@endforeach
	</div>
	@dynamicarea("medical_problems", "medical_problems", "Condition")
	@push("dynamic_templates")
		@include("component.dynamic-templates.medical-problems")
	@endpush
@endif
