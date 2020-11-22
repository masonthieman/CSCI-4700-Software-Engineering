@if (isset($form))
	<div class="row">
		<div class="printing-col col-md-4">
			<label>Completed By</label>
			<span class="printing-span">{{$form->employee->lname . ", " . $form->employee->fname . ". " . $form->employee->title}}</span>
		</div>
		<div class="printing-col col-md-4">
			<label>Employee ID</label>
			<span class="printing-span">{{$form->employee->renova_id}}</span>
		</div>
		<div class="printing-col col-md-4">
			<label>Date</label>
			<span class="printing-span">{{dateValue($form->updated_at)}}</span>
		</div>
	</div>
@else
	<div class="row">
		<div class="form-group col-md-4">
			<label>Completed By</label>
			@text("employee", ["disabled" => "true", "value" => Auth::user()->employee->esig()])
		</div>
		<div class="form-group col-md-4">
			<label>Employee ID</label>
			@text("renova_id", ["disabled" => "true", "value" => Auth::user()->employee->renova_id])
		</div>
		<div class="form-group col-md-4">
			<label>Date</label>
			@date("date_last_completed",  ["disabled" => "true", "value" => dateValue(Carbon\Carbon::now())])
		</div>
	</div>
@endif
