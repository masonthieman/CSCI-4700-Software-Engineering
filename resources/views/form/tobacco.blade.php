@header("Tobacco")
@if (isset($form))
    <div class="row">
        <div class="form-group col-lg-3 col-md-3">
            {{-- @printradio($form->tobacco, "Current tobacco user?") --}}
            <label>Current tobacco user?:</label>
            <span class="printing-span">{{selectYesNoOptionDisplay($form->tobacco)}}</span>
        </div>
		<div class="form-group col-md-3">
            <label>Number of years you used tobacco?:</label>
            <span class="printing-span">{{ $form->tobacco_years }}</span>
        </div>
		<div class="form-group col-lg-3 col-md-3">
            {{-- @printradio($form->prior_tobacco_user, "Prior tobacco user?") --}}
            <label>Prior tobacco user?:</label>
            <span class="printing-span">{{selectYesNoOptionDisplay($form->prior_tobacco_user)}}</span>
        </div>
        <div class="form-group col-lg-3 col-md-3">
            <label>The year that you quit?:</label>
            <span class="printing-span">{{ $form->tobacco_year_quit }}</span>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-3 col-md-3">
            @printcheckbox($form->tobacco_cigarettes, "Cigarettes:")
            <label>
                <span class="printing-span">{{ $form->tobacco_cig_pkt_day }}/day</span>
            </label>
        </div>
        <div class="form-group col-lg-3 col-md-3">
            @printcheckbox($form->tobacco_chew, "Chew:")
            <label>
                <span class="printing-span">{{ $form->tobacco_chew_pkt_day }}/day</span>
            </label>
        </div>
        <div class="form-group col-lg-3 col-md-3">
            @printcheckbox($form->tobacco_pipe, "Pipe")
            <label>
                <span class="printing-span">{{ $form->tobacco_pipe_pkt_day }}/day</span>
            </label>
        </div>
        <div class="form-group col-lg-3 col-md-3">
            @printcheckbox($form->tobacco_cigar, "Cigars:")
            <label>
                <span class="printing-span">{{ $form->tobacco_cigar_pkt_day }}/day</span>
            </label>
        </div>
    </div>
@else
    <div class="row">
        <div class="form-group col-lg-3 col-md-3">
            {{--<yes-no name="tobacco">Current tobacco user?</yes-no>--}}
            <label>Current tobacco user?</label>
            @select("Current tobacco user", "tobacco", [
                1 => "Yes",
                0 => "No"
            ], ["id"=>"tobacco"])
        </div>
		<div class="form-group col-md-3">
            <label>
                Number of years you used tobacco?
            </label>
            @number("tobacco_years", [ "id" => "tobacco-years" ])
        </div>
		<div class="form-group col-lg-3 col-md-3">
            {{--<yes-no name="prior_tobacco_user">Prior tobacco user?</yes-no>--}}
            <label>Prior tobacco user?</label>
            @select("Prior tobacco user", "prior_tobacco_user", [
                1 => "Yes",
                0 => "No"
            ])
        </div>
        <div class="form-group col-lg-3 col-md-3">
            <label>
                The year that you quit?
            </label>
            {{-- @number("tobacco_year_quit", [ "id" => "tobacco-year-quit" ]) --}}
			@text("tobacco_year_quit", ["id" => "tobacco-year-quit", 'placeholder' => 'YYYY'])
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-3 col-md-3">
            @checkbox("Cigarettes", "tobacco_cigarettes", "cigarettes")
            <label class="form-inline">#/day</label>
            @number("tobacco_cig_pkt_day")
        </div>
        <div class="form-group col-lg-3 col-md-3">
            @checkbox("Chew", "tobacco_chew", "chew")
            <label class="form-inline">#/day</label>
            @number("tobacco_chew_pkt_day")
        </div>
        <div class="form-group col-lg-3 col-md-3">
            @checkbox("Pipe", "tobacco_pipe", "pipe")
            <label class="form-inline">#/day</label>
            @number("tobacco_pipe_pkt_day")
        </div>
        <div class="form-group col-lg-3 col-md-3">
            @checkbox("Cigars", "tobacco_cigar", "cigars")
            <label class="form-inline">#/day</label>
            @number("tobacco_cigar_pkt_day")
        </div>
    </div>
@endif
