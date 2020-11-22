<div class="row">
	<div class="col-12">
		<ul class="nav mb-3 nav-tabs nav-fill" id="{{ "$name-tab-bar" }}" role="tablist">
			@foreach($tabs as $tab)
				<li class="nav-item">
					@if ($loop->first)
						<a class="nav-link nav-page-btn active" id="{{ "tabs-$name-$tab-tab" }}" data-toggle="tab" href="{{ "#tabs-$name-$tab" }}" role="tab" aria-controls="{{ "tabs-$name-$tab" }}" area-selected="true" data-change-tab="{{ "$tab" }}">
					@else
						<a class="nav-link nav-page-btn" id="{{ "tabs-$name-$tab-tab" }}" data-toggle="tab" href="{{ "#tabs-$name-$tab" }}" role="tab" aria-controls="{{ "tabs-$name-$tab" }}" area-selected="false" data-change-tab="{{ "$tab" }}">
					@endif
						{{ __("tabs.$name.$tab") }}
					</a>
				</li>
			@endforeach
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-12 tab-content" id="{{ "$name-tab-content" }}">
		@foreach($tabs as $tab)
			@if ($loop->first)
				<div class="tab-pane fade show active" id="{{ "tabs-$name-$tab" }}" role="tabpanel" aria-labelledby="{{ "tabs-$name-$tab-tab" }}">
			@else
				<div class="tab-pane fade" id="{{ "tabs-$name-$tab" }}" role="tabpanel" aria-labelledby="{{ "tabs-$name-$tab-tab" }}">
			@endif
				{!! $$tab !!} {{-- "The $$ is on purpose, it is how my mad-genius system works" - David Ludwig --}}
			</div>
		@endforeach
	</div>
</div>
