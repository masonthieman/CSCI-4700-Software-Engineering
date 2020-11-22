@header("Suppliers")
@if (isset($form))
	@foreach($form->suppliers as $supplier)
		<div class="row">
			<div class="col-4 printing-col">
				<label>Name:</label>
				<span class="printing-span">{{$supplier->name}}</span>
			</div>
			<div class="col-4 printing-col">
				<label>Device:</label>
				<span class="printing-span">{{$supplier->device}}</span>
			</div>
			<div class="col-4 printing-col">
				<label>Number:</label>
				<span class="printing-span">{{$supplier->number}}</span>
			</div>
		</div>
	@endforeach
@else
	@dynamicarea("suppliers", "suppliers", "Supplier")
	@push("dynamic_templates")
		@include("component.dynamic-templates.suppliers")
	@endpush
@endif
