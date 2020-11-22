@header("List All Risk Factors/Conditions Identified")
@if (isset($form))
	@foreach($form->riskFactors as $risk_factor)
		<div class="row">
			<div class="printing-col col-12">
				<label>Risk Factor</label>
				<span class="printing-span">{{$risk_factor->risk_factor}}</span>
			</div>
		</div>
	@endforeach
@else
	@dynamicarea("risk_factors", "risk_factors", "Risk Factor")
	@push("dynamic_templates")
		@include("component.dynamic-templates.risk-factors")
	@endpush
@endif
