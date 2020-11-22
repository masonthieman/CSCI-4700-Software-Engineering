<div class="pagebrk">
    @header("Outcomes")
    <div class="row">
        <div class="col-12 text-center">
            <p><u>NON-BILLABLE OUTCOMES</u>:(Select One)</p>
        </div>
    </div>
    @foreach(config("form.section.non_billable_outcomes") as $non_billable_outcome)
		<div class="form-group col-12">
			@if(isset($form))
				<label>
					<input type="checkbox" {{ $form[$non_billable_outcome] ? "checked" : "" }}>
					{{ ($loop->index + 1) }}. {{ __("form.non_billable_outcomes.$non_billable_outcome") }}
				</label>
			@else
				@checkbox(
					($loop->index + 1) . ". " . __("form.non_billable_outcomes.$non_billable_outcome"),
					$non_billable_outcome,
					toId($non_billable_outcome))
			@endif
		</div>
	@endforeach
</div>