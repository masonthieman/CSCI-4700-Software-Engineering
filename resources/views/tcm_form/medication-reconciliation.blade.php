@header("Medication Management")
@if (isset($form))
	<div class="row">
		<div class="printing-col col-md-6">
			<label for="med_recon_due_date">Due Date:</label>
            <span class="printing-span">{{dateValuePrint($form->med_recon_date)}}</span>
		</div>
		<div class="printing-col col-md-6">
			<label for="med_recon_status" >Status:</label>
			<span class="printing-span">
			    @if(isset($form->med_recon_status))
				    {{config("form.med_recon_status")[$form->med_recon_status]}}
			    @endif
			</span>
		</div>
	</div>
	<div class="row">
		<div class="printing-col col-sm-2">
			@printcheckbox($form->med_recon_follow_up, "Follow Up")
		</div>
		<div class="printing-col col-md-10">
			<label for="med_recon_follow_up_date">Follow up date</label>
            <span class="printing-span">{{dateValuePrint($form->med_recon_follow_up_date)}}</span>
		</div>
	</div>
@else
	<div class="row">
		<div class="form-group col-md-4">
			<label for="med_recon_due_date">Due Date:</label>
			@date("med_recon_date", ["id" => "med_recon_date"])
		</div>
		<div class="form-group col-md-2">
			<label for="med_recon_status" >Status:</label>
			@select("Required", "med_recon_status", config("form.med_recon_status"))
		</div>
	</div>
	<div class="row">
		<div class="form-group col-sm-4">
			@checkbox("Follow Up", "med_recon_follow_up", "med_recon_follow_up")
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="med_recon_follow_up_date">Follow up date</label>
			@date("med_recon_follow_up_date", ["id" => "med_recon_follow_up_date"])
		</div>
	</div>
@endif