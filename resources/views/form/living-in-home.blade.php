@header("List Everyone Living in Your Home")
@if (isset($form))
	@foreach($form->occupants as $occupant)
        <div class="row">
            <div class="printing-col col-md-12">
				Name:
                <span class="printing-span">{{$occupant->name}}</span>
            </div>
        </div>
    @endforeach
@else
    @dynamicarea("occupants", "occupants", "person")
    @push("dynamic_templates")
		@include("component.dynamic-templates.occupants")
	@endpush
@endif
