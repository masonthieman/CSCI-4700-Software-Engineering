@header("Chronic Conditions")
@if (isset($form))

@else
	@dynamicarea("chronic_conditions", "chronic_conditions", "Chronic Condition")
	@push("dynamic_templates")
		@include("component.dynamic-templates.chronic-condition")
	@endpush
@endif
