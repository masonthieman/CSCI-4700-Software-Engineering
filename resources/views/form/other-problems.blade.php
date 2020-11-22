@header("Other Problems")
<div class="row">
	<div class="col-12 text-center">
		<p>Do you have or had any significant symptoms in the following areas:</p>
	</div>
</div>
@if (isset($form))
	<div class="row">
		@foreach(config("form.section.other_problems") as $problem)
			<div class="col-3 printing-col">
				@printcheckbox($form->$problem, __("form.other_problems.$problem"))
			</div>
		@endforeach
	</div>
	@foreach($form->otherProblems as $problem)
		<div class="row">
			<div class="col-12 printing-col">
				<label>Description:</label>
				<span class="printing-span">{{$problem->description}}</span>
			</div>
		</div>
	@endforeach
	<div class="row">
		<div class="col-12 printing-col">
			<label>Other notes:</label>
			<span class="printing-span">{{ $form->other_problems_notes ?? "N/A" }}</span>
		</div>
	</div>
@else
	<div class="row">
		@foreach(config("form.section.other_problems") as $problem)
			<div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-6">
				@checkbox(__("form.other_problems.$problem"), $problem, toId($problem))
			</div>
		@endforeach
	</div>
	@dynamicarea("other_problems", "other_problems", "Problem")
	@push("dynamic_templates")
		@include("component.dynamic-templates.other-problems")
	@endpush
	<div class="row">
		<div class="form-group col-12">
			<textarea class="form-control" cols="30" name="other_problems_notes" rows="5" placeholder="Notes for other problems..."></textarea>
		</div>
	</div>

@endif
