@header("Drugs")
<div class="row">
    @if (isset($form))
        <div class="col-12">
            @printradio($form->street_drugs, "Do you currently or have you previously used recreational or street drugs?")
        </div>
        <div class="col-12">
            @printradio($form->needle_drugs, "Have you ever given yourself street drugs with a needle?")
        </div>
    @else
        <div class="form-group col-md-7">
            <yes-no name="street_drugs">Do you currently or have you previously used recreational or street drugs?</yes-no>
        </div>
        <div class="form-group col-md-5">
            <yes-no name="needle_drugs">Have you ever given yourself street drugs with a needle?</yes-no>
        </div>
    @endif
</div>
