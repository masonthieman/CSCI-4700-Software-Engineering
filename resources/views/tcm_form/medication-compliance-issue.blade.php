@header("Compliance Issues")
@if (isset($form))
	@foreach($form->tcm_med_recon_compliance_issues as $compliance_issue)
		<div class="row">
			<div class="printing-col col-md-6">
				<label for="">Drug:</label>
				<span class="printing-span">{{$compliance_issue->med_recon_compliance_issue_drug_name}}</span>
			</div>
			<div class="printing-col col-md-6">
				<label for="">Reason:</label>
				<span class="printing-span">
					@if(isset($compliance_issue->med_recon_compliance_issue_reason))
						{{config("form.med_recon_compliance_issue_reason")[$compliance_issue->med_recon_compliance_issue_reason]}}
					@endif
				</span>
			</div>
		</div>
	@endforeach
	<div class="row">
		<div class="printing-col col-md-12">
			<label for="">Notes</label>
			<span class="printing-span">{{$form->med_recon_compliance_issue_notes}}</span>
		</div>
	</div>
@else
	<div class="form-group">
		@dynamicarea("tcm_med_recon_compliance_issues", "tcm_med_recon_compliance_issues", "Compliance Issues")
		@push("dynamic_templates")
			@include("component.tcm-dynamic-templates.tcm-med-recon-compliance-issue")
		@endpush
		<div class="row">
			<div class="form-group col-md-10">
				<label for="">Notes</label>
				@text('med_recon_compliance_issue_notes', ["id" => "med_recon_compliance_issue_notes"])
			</div>
		</div>
	</div>
@endif