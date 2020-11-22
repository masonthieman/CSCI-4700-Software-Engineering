@header("Other Notes")
@if (isset($form))
	<div class="row">
		<div class="form-group printing-col col-12">
			<span class="printing-span">
				{{$form->other_notes}}
			</span>
		</div>
	</div>
@else
	<div class="row">
		<div class="col-12">
			<textarea class="form-control" cols="30" id="other_notes" name="other_notes" rows="10"></textarea>
		</div>
	</div>
@endif
