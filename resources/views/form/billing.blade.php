@header("Billing")
@if (isset($form))
	<div class="row">
        @foreach(config("form.billing_codes") as $name => $label)
            <div class="col-12">
                @printcheckbox($form->$name, ($loop->index + 1) . ". $label")
            </div>
        @endforeach
    </div>
    @foreach($form->billingOthers as $billingOther)
        <div class="row">
            <div class="col-md-8 printing-col">
                <span class="printing-span">{{$billingOthers->value}}</span>
            </div>
            <div class="col-md-4 printing-col">
                <span class="printing-span">{{$billingOthers->cpt}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label>
                    Other
                </label>
            </div>
            <div class="col-md-4">
                <label>
                    CPT
                </label>
            </div>
        </div>
    @endforeach
@else
	<div class="row">
		@foreach(config("form.billing_codes") as $name => $label)
			<div class="form-group col-12">
				<div class="custom-control custom-checkbox">
					<input id="{{ str_replace('_', '-', $name) }}" name="{{ $name }}" class="custom-control-input" type="checkbox" value="1"/>
					<label class="custom-control-label" for="{{ str_replace('_', '-', $name) }}">
						{{ $loop->index + 1}}. {{ $label }}
					</label>
				</div>
			</div>
		@endforeach
	</div>
	@dynamicarea("billing_others", "billing_others", "Additional Billing")
	@push("dynamic_templates")
		@include("component.dynamic-templates.billing-others")
	@endpush
@endif
