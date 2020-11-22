@header("Medication Changes")
@if(isset($form))
	@foreach($form->tcm_med_recon_prior_medication_changes as $medication_changes)
		<div class="row">
			<div class="printing-col col-md-3">
				<label for="">Type:</label>
				<span class="printing-span">
				@if(isset($medication_changes->med_recon_medication_changes_type))
					{{ config("form.med_recon_medication_changes_type")[$medication_changes->med_recon_medication_changes_type] }}
				@endif
				</span>
			</div>
	
			<div class="printing-col col-md-3">
				<label for="">Drug Name:</label>
				<span class="printing-span">{{$medication_changes->med_recon_medication_changes_drug_name}}</span>
			</div>

			<div class="printing-col col-md-3">
				<label for="">Dose:</label>
				<span class="printing-span">{{$medication_changes->med_recon_medication_changes_dose}}</span>
			</div>

			<div class="printing-col col-md-3">
				<label for="">Frequency:</label>
				<span class="printing-span">{{$medication_changes->med_recon_medication_changes_frequency}}</span>
			</div>
		</div>
	@endforeach
		<!-- @dynamicarea("med_recon_medication_change", "med_recon_medication_change","Medication Changes (Prior Meds)") -->
	<div class="row">
		<div class="printing-col col-md-12">
			<label for="">Notes:</label>
			<span class="printing-span">{{$form->med_recon_medication_changes_notes}}</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h6><u>Actions:</u> Select all that apply</h6>
		</div>
	</div>
	<div class="horizontal">
		<div class="printing-col col-md-8">
			@printcheckbox($form->med_recon_no_med_adherence_issues, "No Medication Adherence Issues")
		</div>
		<div class="printing-col col-md-8">
			@printcheckbox($form->med_recon_care_manager_intervention, "Care Manager Intervention Provided")
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="printing-col">
					<label for="med_recon_not_completed_prior_to_face_to_face_reason">Note:</label>
					<span class="printing-span">{{$form->med_recon_care_manager_intervention_note}}</span>
				</div>
			</div>
		</div>
	</div>
	<div class="horizontal">
		<div class="printing-col">
			@printcheckbox($form->med_recon_pharm_consult_requested, "Pharmacist Consult Requested")
		</div>
		<div class="row col-md-10">
			<label for="">Note:</label>
			<span class="printing-span">{{$form->med_recon_pharm_consult_requested_note}}</span>
		</div>
	</div>
	<div class="horizontal">
		<div class="printing-col">
			@printcheckbox($form->med_recon_phys_notification_completed, "Physician Notification Completed For Identified Issues")
		</div>
		<div class="row col-md-10">
			<label for="">Note:</label>
			<span class="printing-span">{{$form->med_recon_phy_notification_completed_note}}</span>
		</div>
	</div>
	<div class="horizontal">
		<div class="printing-col">
			<label for="">Comments:</label>
			<span class="printing-span">{{$form->med_recon_comments}}</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h6><u>Outcome:</u></h6>
		</div>
	</div>
	<div class="horizontal">
		<div class="printing-col col-md-8">
			@printcheckbox($form->med_recon_completed_prior_to_face_to_face, "Medication Reconciliation Completed Prior to Face to Face")
		</div>
		<div class="printing-col col-md-8">
			@printcheckbox($form->med_recon_not_completed_prior_to_face_to_face, "Medication Reconciliation Not Completed Prior to Face to Face")
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="printing-col">
					<label for="med_recon_not_completed_prior_to_face_to_face_reason">Reason:</label>
					<span class="printing-span">{{$form->med_recon_not_completed_prior_to_face_to_face_reason}}</span>
				</div>
			</div>
		</div>
	</div>
@else
	<div class="form-group">
		@dynamicarea("tcm_med_recon_prior_medication_changes", "tcm_med_recon_prior_medication_changes", "Medication Changes (Prior Meds)")
		@push("dynamic_templates")
			@include("component.tcm-dynamic-templates.tcm-med-recon-medication-change")
		@endpush
	</div>
	
	<div class="row">
		<div class="form-group col-md-12">
			<label for="">Notes:</label>
			@text('med_recon_medication_changes_notes', ["id" => "med_recon_medication_changes_notes"])
		</div>
	</div>

	<div class="horizontal">
		<div class="form-group">
			<label for=""><u>Actions:</u> Select all that apply</label>
			@checkbox("No Medication Adherence Issues", "med_recon_no_med_adherence_issues","med_recon_no_med_adherence_issues")
		</div>
	</div>
	<div class="horizontal">
		<div class="form-group">
			@checkbox("Care Manager Intervention Provided","med_recon_care_manager_intervention","med_recon_care_manager_intervention")
		</div>
		<div class="row col-md-10">
			<label for="">Note:</label>
			@text("med_recon_care_manager_intervention_note", ["id" => "med_recon_care_manager_intervention_note"])
		</div>
	</div>
	<div class="horizontal">
		<div class="form-group">
			@checkbox("Pharmacist Consult Requested","med_recon_pharm_consult_requested","med_recon_pharm_consult_requested")
		</div>
		<div class="row col-md-10">
			<label for="">Note:</label>
			@text("med_recon_pharm_consult_requested_note", ["id" => "med_recon_pharm_consult_requested_note"])
		</div>
	</div>
	<div class="horizontal">
		<div class="form-group">
			@checkbox("Physician Notification Completed For Identified Issues","med_recon_phys_notification_completed","med_recon_phys_notification_completed")
		</div>
		<div class="row col-md-10">
			<label for="">Note:</label>
			@text("med_recon_phy_notification_completed_note", ["id" => "med_recon_phy_notification_completed_note"])
		</div>
	</div>
	<div class="horizontal">
		<div class="form-group">
			<label for="">Comments:</label>
			@text("med_recon_comments", ["id" => "med_recon_comments"])
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h6><u>Outcome:</u></h6>
		</div>
	</div>
	<div class="horizontal">
		<div class="col-md-8">
			@checkbox("Medication Reconciliation Completed Prior to Face to Face", "med_recon_completed_prior_to_face_to_face", "med_recon_completed_prior_to_face_to_face")
		</div>
		<div class="col-md-8">
			@checkbox("Medication Reconciliation Not Completed Prior to Face to Face", "med_recon_not_completed_prior_to_face_to_face", "med_recon_not_completed_prior_to_face_to_face")
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="med_recon_not_completed_prior_to_face_to_face_reason">Reason:</label>
					@text("med_recon_not_completed_prior_to_face_to_face_reason")
				</div>
			</div>
		</div>
	</div>
@endif