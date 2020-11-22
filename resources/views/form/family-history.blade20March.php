@header("Family History")
<div class="row">
	@if (isset($form))
		<div class="col-4">
			<h5>Condition</h5>
		</div>
		<div class="col-3 text-center">
			<h5>No/Yes</h5>
		</div>
		<div class="col-5">
			<h5>Relationship</h5>
		</div>
		@foreach (config("form.section.family_history") as $history)
			<div class="printing-col col-4">
				<label>{{ __("form.family_history.$history") }}</label>
			</div>
			<div class="col-3 text-center">
				@printradio($form->$history, " ")
			</div>
			<div class="printing-col col-5">
				<span class="printing-span">
					{{ $form->{"{$history}_relationship"} }}
				</span>
			</div>
		@endforeach
	@else
		<div class="col-4">
			<h5>Condition</h5>
		</div>
		<div class="col-4">
			<h5>Yes/No</h5>
		</div>
		<div class="col-4">
			<h5>Relationship</h5>
		</div>
		@foreach (config("form.section.family_history") as $history)
			<div class="col-4">
				<label>{{ __("form.family_history.$history") }}</label>
			</div>
			<div class="col-4 form-group">
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
					<label for="{{ toId($history) }}-yes" class="btn btn-outline-primary">
						@input("radio", $history, ["autocomplete" => "off", "value" => "1", "id" => "{{ toId($history) }}-yes", "data-feedback" => "{{ toId($history) }}-feedback"]) Yes
					</label>
					<label for="{{ toId($history) }}-no" class="btn btn-outline-primary">
						@input("radio", $history, ["autocomplete" => "off", "value" => "0", "id" => "{{ toId($history) }}-no", "data-feedback" => "{{ toId($history) }}-feedback"]) No
					</label>
				</div>
				<div class="invalid-feedback visible" data-feedback-area="{{ toId($history) }}-feedback"></div>
			</div>

			<div class="col-4 form-group">
				@text("{$history}_relationship")
			</div>
		@endforeach
	@endif
</div>
