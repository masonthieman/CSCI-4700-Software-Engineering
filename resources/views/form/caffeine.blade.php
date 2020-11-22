@header("Caffeine")
@if (isset($form))
    <div class="row">
        <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-6">
            @printcheckbox($form->caffeine_none, "None")
        </div>
        @foreach(config("form.section.caffeine") as $caffeine)
            <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-6">
			    @printcheckbox($form->$caffeine, __("form.caffeine.$caffeine"))
				<label>#/day</label><span class="printing-span">{{ $form->{$caffeine . "_cups_per_day"} }}</span>
            </div>
        @endforeach
    </div>
@else
    <div class="row">
        <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-6">
            @checkbox("None", "caffeine_none", "caffeine-none")
        </div>
        @foreach(config("form.section.caffeine") as $caffeine)
            <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-6">
                @checkbox(__("form.caffeine.$caffeine"), $caffeine, toId($caffeine))
                <label>#/day</label>
                @number($caffeine . "_cups_per_day")
            </div>
        @endforeach
    </div>
@endif