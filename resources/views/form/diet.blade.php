@header("Diet")
@if (isset($form))
    <div class="row">
        <div class="col-md-6">
            @printradio($form->diet, "Are you dieting?")
        </div>
        <div class="col-md-6">
            @printradio($form->prescribed_diet, "Are you on a physician-prescribed medical diet?")
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 printing-col">
            <label>What is a typical day of meals?</label>
            <span class="printing-span">{{$form->typical_meal}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 printing-col">
            <label>Rank salt intake:</label>
            <span class="printing-span">{{threeScale($form->salt_intake)}}</span>
        </div>
        <div class="col-md-6 printing-col">
            <label>Rank fat intake</label>
            <span class="printing-span">{{threeScale($form->fat_intake)}}</span>
        </div>
    </div>
@else
    <div class="row">
        <div class="form-group col-md-6">
            <yes-no name="dieting">Are you dieting?</yes-no>
        </div>
        <div class="form-group col-md-6">
            <yes-no name="prescribed_diet">Are you on a physician-prescribed medical diet?</yes-no>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label>What is a typical day of meals?</label>
            @text("typical_meal")
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label>Rank salt intake</label>
            @select("Salt intake", "salt_intake", [
                "2" => "High",
                "1" => "Medium",
                "0" => "Low"
            ], [ "id" => "salt-intake" ])
        </div>
        <div class="form-group col-md-6">
            <label>Rank fat intake</label>
            @select("Fat intake", "fat_intake", [
                "2" => "High",
                "1" => "Medium",
                "0" => "Low"
            ], [ "id" => "fat-intake" ])
        </div>
    </div>
@endif
