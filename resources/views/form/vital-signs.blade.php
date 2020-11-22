@header("Vital Signs")
@if (isset($form))
    <div class="row">
        <div class="printing-col col-3">
            <label>Height (in):</label>
            <span class="printing-span">{{$form->vital_height}}</span>
        </div>
        <div class="printing-col col-3">
            <label>Weight (lbs):</label>
            <span class="printing-span">{{$form->vital_weight}}</span>
        </div>
        <div class="printing-col col-3">
            <label>BMI:</label>
            <span class="printing-span">{{$form->bmi}}</span>
        </div>
        <div class="printing-col col-md-3">
            <label>Blood Pressure:</label>
            <span class="printing-span">{{$form->blood_pressure}}</span>
        </div>
    </div>
    <div class="row">
        <div class="printing-col col-12">
            <label>Other:</label>
            <span class="printing-span">{{$form->vital_other}}</span>
        </div>
    </div>
@else
    <div class="row">
        <div class="form-group col-md-2">
            <label>Height (in)</label>
            @number("vital_height", ["id" => "vital-height"])
        </div>
        <div class="form-group col-md-3 col-lg-2">
            <label>Weight (lbs)</label>
            @number("vital_weight", ["id" => "vital-weight"])
        </div>
        <div class="form-group col-md-3 col-lg-2">
            <label>BMI</label>
            @text("bmi", ["id" => "bmi", "readonly" => "readonly"])
        </div>
        <div class="form-group col-md-4 col-lg-2">
            <label>Blood Pressure</label>
            @text("blood_pressure")
        </div>
        <div class="form-group col-md-12 col-lg-4">
            <label>Other</label>
            @text("vital_other")
        </div>
    </div>
@endif
