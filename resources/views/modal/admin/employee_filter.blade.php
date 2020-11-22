<div class="modal fade" id="modal-employee-filter" tabindex="-1" role="dialog" aria-labelledby="modal-employee-filter-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="#" method="post" name="employee_filter">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-employee-filter-title">Filter Employees</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<h5>By Employee Status</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								@checkbox("Active", "active", "employee-filter-active")
							</div>
							<div class="col-6">
								@checkbox("Inactive", "inactive", "employee-filter-inactive")
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<hr>
								<h5>By Practice</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<select class="selectpicker form-control show-tick" id="filter-practice-select" name="practice" data-live-search="true" title="Select Practice" data-style="custom-select">
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<hr>
								<h5>By Employee Title</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<select class="selectpicker form-control show-tick" id="filter-title-select" name="title" data-live-search="true" title="Select Title" data-style="custom-select">
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-secondary">Apply Filter</button>
				</div>
			</form>
		</div>
	</div>
</div>
