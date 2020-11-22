@if (isset($form))
	<div class="row">
		<div class="col-12 printing-col">
			@printcheckbox($form->poa, "Has power of attorney")
		</div>
	</div>
	<div class="row">
		<div class="col-3 printing-col">
			<span class="printing-span">{{ $form->poa_name }}</span>
		</div>
		<div class="col-3 printing-col">
			<span class="printing-span">{{ $form->poa_relationship }}</span>
		</div>
		<div class="col-2 printing-col">
			<span class="printing-span">{{ $form->poa_phone }}</span>
		</div>
		<div class="col-4 printing-col">
			<span class="printing-span">{{ $form->poa_email }}</span>
		</div>
	</div>
	<div class="row">
		<div class="col-3 form-group">Name</div>
		<div class="col-3 form-group">Relationship</div>
		<div class="col-2 form-group">Phone</div>
		<div class="col-4 form-group">Email</div>
	</div>
@else
	<div class="row">
		<div class="col-12 form-group">
			@checkbox("Has power of attorney", "poa", "poa")
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 form-group">
			<label>Name</label>
			@text("poa_name")
		</div>
		<div class="col-md-3 form-group">
			<label>Relationship</label>
			@text("poa_relationship")
		</div>
		<div class="col-md-3 form-group">
			<label>Phone Number</label>
			@phone("poa_phone")
		</div>
		<div class="col-md-3 form-group">
			<label>Email</label>
			@email("poa_email")
		</div>
	</div>
@endif
