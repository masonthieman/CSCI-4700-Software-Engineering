@header("Alcohol")
@if (isset($form))
    <div class="row">
        <div class="col-md-12 printing-col">
            @printradio($form->alcohol, "Do you drink alcohol?")
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 printing-col">
            <label>If yes, what kinds?:</label>
            <span class="printing-span">{{$form->alcohol_kind}}</span>
        </div>
        <div class="col-md-5 printing-col">
            <label>How many drinks per week?:</label>
			<span class="printing-span">{{$form->alcohol_amount_week}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 printing-col">
            @printradio($form->alcohol_concern, "Are you or others concerned about the amount you drink?")
        </div>
        <div class="col-md-5 printing-col">
            @printradio($form->alcohol_consider_stop, "Have you ever considered stopping?")
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 printing-col">
            @printradio($form->alcohol_blackouts, "Have you ever experienced blackouts?")
        </div>
        <div class="col-md-6 printing-col">
            @printradio($form->alcohol_binge_drink, "Are you prone to binge drinking?")
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @printradio($form->alcohol_drive_drunk, "Do you drive after you drink?")
        </div>
    </div>
@else
    <div class="row">
        <div class="form-group col-md-2">
            <yes-no name="drink_alcohol">Do you drink alcohol?</yes-no>
        </div>
        <div class="form-group col-md-7">
            <label>If yes, what kinds?</label>
            @text("alcohol_kind")
        </div>
        <div class="form-group col-md-3">
            <label>How many drinks per week?</label>
			@select("Drinks per week", "alcohol_amount_week", [
                "1-4" => "1-4",
                "5-10" => "5-10",
                "10+" => "10+"
            ], [ "id" => "alcohol_amount_week" ])
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group">
            <yes-no name="alcohol_concern">Are you or others concerned about the amount you drink?</yes-no>
        </div>
        <div class="col-md-4 form-group">
            <yes-no name="alcohol_consider_stop">Have you considered stopping?</yes-no>
        </div>
        <div class="col-md-4 form-group">
            <yes-no name="alcohol_blackouts">Have you ever experienced blackouts?</yes-no>
        </div>
        <div class="col-md-4 form-group">
            <yes-no name="alcohol_binge_drink">Are you prone to binge drinking?</yes-no>
        </div>
        <div class="col-md-4 form-group">
            <yes-no name="alcohol_drive_drunk">Do you drive after you drink?</yes-no>
        </div>
    </div>
@endif
