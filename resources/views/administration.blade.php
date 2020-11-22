@extends("base.master")
@section("body")
	<div class="container bg-white">
		<div class="row">
			<div class="col-12">
				<h2 class="page-heading">Administration Tool</h2>
			</div>
		</div>
		@component("component.tabs", [
			"name"   => "admin",
			"tabs"   => ["employees", "practices"]
		])
			@slot("employees")
				<div class="form-row">
					@if (Auth::user() && Auth::user()->is_admin)
						<div class="col-md-6 col-lg-8 form-group">
							<input type="text" class="form-control" id="filter-employees" placeholder="Search">
						</div>
						<div class="col-6 col-md-3 col-lg-2 form-group">
							<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-employee-filter" id="employee-filter-button">Filter Employees</button>
						</div>
						<div class="col-6 col-md-3 col-lg-2 form-group">
							<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-employee-add" id="employee-add-button">Add Employee</button>
						</div>
					@else
						<div class="col-md-8 col-lg-10 form-group">
							<input type="text" class="form-control" id="filter-employees" placeholder="Search">
						</div>
						<div class="col-6 col-md-3 col-lg-2 form-group">
							<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-employee-filter" id="employee-filter-button">Filter Employees</button>
						</div>
					@endif
				</div>
				<div class="row">
					<div class="col-12">
						@table([
							"name"          => "employees",
							"booleanFields" => ["is_active", "is_manager", "is_admin"],
							"clickable"     => True,
							"columns"       => [
								"renova_id",
								"esig",
								"is_active",
								"is_manager",
								"is_admin"
							],
							"keywordIndices" => [
								"renova_id",
								"esig"
							]
						])
					</div>
				</div>
				<div class="row">
					<div class="col-12 form-group">
						<form action="{{ route("print-table") }}" method="post" target="_blank" id="print-employees">
							@csrf
							<input type="hidden" name="name" id="table-employees-name" value="">
							<input type="hidden" name="columns" id="table-employees-columns" value="[]">
							<input type="hidden" name="data" id="table-employees-data" value="[]">
							<input type="hidden" name="boolean_fields" id="table-employees-boolean-fields" value="[]">
							<button type="submit" class="btn btn-primary">Print</button>
						</form>
					</div>
				</div>
			@endslot
			@slot("practices")
				<div class="form-row">
					@if (Auth::user() && Auth::user()->is_admin)
						<div class="col-md-6 col-lg-8 form-group">
							<input type="text" class="form-control" id="filter-practices" placeholder="Search">
						</div>
						<div class="col-6 col-md-3 col-lg-2 form-group">
							<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-practice-filter" id="practice-filter-button">Filter Practices</button>
						</div>
						<div class="col-6 col-md-3 col-lg-2 form-group">
							<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-practice-add">Add Practice</button>
						</div>
					@else
						<div class="col-md-8 col-lg-10 form-group">
							<input type="text" class="form-control" id="filter-practices" placeholder="Search">
						</div>
						<div class="col-6 col-md-3 col-lg-2 form-group">
							<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-practice-filter" id="practice-filter-button">Filter Practices</button>
						</div>
					@endif
				</div>
				<div class="row">
					<div class="col-12 table-responsive-xl">
						@table([
							"name"          => "practices",
							"booleanFields" => ["is_active"],
							"clickable"     => True,
							"columns"       => [
								"number",
								"name",
								"is_active"
							],
							"keywordIndices" => [
								"number",
								"name"
							]
						])
					</div>
				</div>
				<div class="row">
					<div class="col-12 form-group">
						<form action="{{ route("print-table") }}" method="post" target="_blank" id="print-practices">
							@csrf
							<input type="hidden" name="name" id="table-practices-name" value="">
							<input type="hidden" name="columns" id="table-practices-columns" value="[]">
							<input type="hidden" name="data" id="table-practices-data" value="[]">
							<input type="hidden" name="boolean_fields" id="table-practices-boolean-fields" value="[]">
							<button type="submit" class="btn btn-primary">Print</button>
						</form>
					</div>
				</div>
			@endslot
		@endcomponent
	</div>
	@include("modal.wait")
	@include("modal.admin.employee_add")
	@include("modal.admin.employee_edit")
	@include("modal.admin.employee_filter")
	@include("modal.admin.practice_filter")
	@include("modal.admin.practice_add")
	@include("modal.admin.practice_edit")
@endsection

@push("dynamic_templates")
	<div data-dynamic-template-id="physicians" class="row dynamic-form align-items-end">
        <div class="form-group col-12">
            <label>Name</label>
            <div class="input-group">
                @text('name', ['data-feedback' => 'name-feedback'])
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" data-dynamic-action="remove" type="button">Remove</button>
                </div>
            </div>
            <div class="invalid-feedback visible" data-feedback-area="name-feedback"></div>
        </div>
    </div>
@endpush

@push("scripts")
	<script>
		$(document).ready(function() {
			admin.init();

			$("#print-employees").submit(function() {
                var t = table("employees");
                $("#table-employees-name").val("employees");
                $("#table-employees-columns").val(JSON.stringify(t.columns()));
				$("#table-employees-data").val(JSON.stringify(t.filteredData()));
				$("#table-employees-boolean-fields").val(JSON.stringify(t.booleanFields()));
			});

			$("#print-practices").submit(function() {
                var t = table("practices");
                $("#table-practices-name").val("practices");
                $("#table-practices-columns").val(JSON.stringify(t.columns()));
				$("#table-practices-data").val(JSON.stringify(t.filteredData()));
				$("#table-practices-boolean-fields").val(JSON.stringify(t.booleanFields()));
            });
		});
	</script>
@endpush
