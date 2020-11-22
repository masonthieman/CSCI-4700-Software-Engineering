@header("Advanced Directives")
@include("component.power-of-attorney")
@if (isset($form))
    <div class="row">
        <div class="printing-col col-12">
            @printradio($form->living_will, "Do you have a healthcare advanced directive (living will)?")
        </div>
    </div>
    <div class="row">
        <div class="printing-col col-12">
            @printradio($form->polst, "Physician Orders for Life Sustaining Treatment (POLST)?")
        </div>
    </div>
    <div class="row">
        <div class="printing-col col-12">
            @printradio($form->info_prep_requested, "Would you like information on the preparation of any of these?")
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-4 form-group">
            <yes-no name="living_will">Do you have a healthcare advance directive (living will)?</yes-no>
        </div>
        <div class="col-md-4 form-group">
            <yes-no name="polst">Physician Orders for Life Sustaining Treatment (POLST)?</yes-no>
        </div>
        <div class="col-md-4 form-group">
            <yes-no name="info_prep_requested">Would you like information on the preparation of any of these?</yes-no>
        </div>
    </div>
@endif
