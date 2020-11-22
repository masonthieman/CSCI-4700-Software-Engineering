@header("Pharmacy")
@if (isset($form))
	@foreach($form->tcm_med_recon_pharmacies as $tcm_med_recon_pharmacy)
		<div class="row">
			<div class="printing-col col-md-6">
				<label for="">Pharmacy Name:</label>
				<span class="printing-span">{{$tcm_med_recon_pharmacy->med_recon_pharmacy_name}}</span>
			</div>
			<div class="printing-col col-md-3">
				<label for="">Phone:</label>
				<span class="printing-span">{{$tcm_med_recon_pharmacy->med_recon_pharmacy_phone}}</span>
			</div>
			<div class="printing-col col-md-3">
				<label for="">Fax:</label>
				<span class="printing-span">{{$tcm_med_recon_pharmacy->med_recon_pharmacy_fax}}</span>
			</div>
		</div>
	@endforeach
@else
	<div class="form-group">
		@dynamicarea("tcm_med_recon_pharmacies", "tcm_med_recon_pharmacies", "Pharmacy")
		@push("dynamic_templates")
			@include("component.tcm-dynamic-templates.med-recon-pharmacy")
		@endpush
	</div>
@endif