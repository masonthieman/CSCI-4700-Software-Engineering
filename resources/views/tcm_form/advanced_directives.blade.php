@header("Advanced Directives")
@if (isset($form))
    @include("component.power-of-attorney")
    <div class="row">
		<div class="col-md-3 printing-col">
			@printradio($form->living_will, "Do you have a healthcare advance directive (living will)?")
		</div>
		<div class="col-md-3 printing-col">
			@printradio($form->polst, "Physician Orders for Life Sustaining Treatment (POLST)?")
		</div>
		<div class="col-md-3 printing-col">
			@printradio($form->info_prep_requested, "Would you like information on the preparation of any of these?")
		</div>
		<div class="col-md-3 printing-col">
			@printradio($form->pcp, "Does your PCP have a copy?")
		</div>
	</div>
@else
    @include("component.power-of-attorney")
    <div class="row">
		<div class="col-md-3 form-group">
			<yes-no name="living_will">Do you have a healthcare advance directive (living will)?</yes-no>
		</div>
		<div class="col-md-3 form-group">
			<yes-no name="polst">Physician Orders for Life Sustaining Treatment (POLST)?</yes-no>
		</div>
		<div class="col-md-3 form-group">
			<yes-no name="info_prep_requested">Would you like information on the preparation of any of these?</yes-no>
		</div>
		<div class="col-md-3 form-group">
			<yes-no name="pcp">Does your PCP have a copy?</yes-no>
		</div>
	</div>
@endif

