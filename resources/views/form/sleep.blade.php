@header("Sleep")
@if (isset($form))
    <div class="row">
        <div class="col-6 printing-col">
            @printradio($form->sleep_apnea, "Do you have sleep apnea?")
        </div>
        <div class="col-6 printing-col">
            @printradio($form->cpap, "Do you have a CPAP machine?")
        </div>
        <div class="col-4 printing-col">
            <label>Do you use it?</label>
            <span class="printing-span">{{ config("form.usage.$form->cpap_uses") }}</span>
        </div>
        <div class="col-8 printing-col">
            <label>Is it in good working condition?</label>
            <span class="printing-span">{{ $form->cpap_working }}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 printing-col">
            <label>How many hours a night do you sleep?:</label>
            <span class="printing-span">{{$form->night_sleep_hours}}</span>
        </div>
        <div class="col-md-6">
            @printradio($form->trouble_sleeping, "Do you have trouble falling asleep?")
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @printradio($form->nap_day, "Do you nap during the day?")
        </div>
        <div class="col-md-6">
            @printradio($form->sleep_aid, "Do you take a sleep aid?")
        </div>
    </div>
@else
    <div class="row">
        <div class="form-group col-md-6">
            <yes-no name="sleep_apnea">Do you have sleep apnea?</yes-no>
        </div>
        <div class="form-group col-md-6">
            <yes-no name="cpap">Do you have a CPAP machine?</yes-no>
        </div>
        <div class="form-group col-md-3">
            <label>Do you use it?</label>
            @select("Usage", "cpap_uses", config("form.usage"))
        </div>
        <div class="form-group col-md-9">
            <label>Is it in good working condition?</label>
            @text("cpap_working")
        </div>
        <div class="form-group col-md-12">
            <label>How many hours a night do you sleep?</label>
            @number("sleep_hours")
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <yes-no name="trouble_sleeping">Do you have trouble falling asleep?</yes-no>
        </div>
        <div class="form-group col-md-4">
            <yes-no name="nap_day">Do you nap during the day?</yes-no>
        </div>
        <div class="form-group col-md-4">
            <yes-no name="sleep_aid">Do you take a sleep aid?</yes-no>
        </div>
    </div>
@endif
