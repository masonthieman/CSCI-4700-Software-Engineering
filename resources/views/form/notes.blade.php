@header("Notes")
@if (isset($form))
    <div class="row">
        <div class="col-12">
            @printradio($form->cognitive_impairment, "Is cognitive impairment evident?")
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <h5>Other Notes</h5>
            <span class="printing-span">{{$form->other_notes}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 printing-col">
            <label>Completed by:</label>
            <span class="printing-span">{{$form->employee->esig()}}</span>
        </div>
        <div class="col-md-3 printing-col">
            <label>Date</label>
            <span class="printing-span">{{$form->updated_at}}</span>
        </div>
        <div class="col-md-3 printing-col">
            <label>Employee ID</label>
            <span class="printing-span">{{$form->employee->renova_id}}</span>
        </div>
    </div>
@else
    <div class="row">
        <div class="form-group col-md-12">
            <yes-no name="cognitive_impairment">Is cognitive impairment evident?</yes-no>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <h5>Other Notes</h5>
            <textarea class="form-control" cols="30" name="other_notes" rows="10"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label>Completed By</label>
            @text("employee", ["disabled" => "true", "value" => Auth::user()->employee->esig()])
        </div>
        <div class="form-group col-md-4">
            <label>Employee ID</label>
            @text("employee_id", ["disabled" => "true", "value" => Auth::user()->employee->renova_id])
        </div>
        <div class="form-group col-md-4">
            <label>Date</label>
            @date("date_last_completed",  [ "value" => dateValue(Carbon\Carbon::now())])
        </div>
    </div>
@endif
