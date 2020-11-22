<div class="modal fade" id="modal-employee-edit" tabindex="-1" role="dialog" aria-labelledby="modal-employee-edit-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-employee-edit-title">Edit Employee</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					@component("component.tabs", [
						"name" => "employee-edit",
						"tabs" => ["account", "practices"]
					])
						@slot("account")
							<form action="{{ route("ajax.employee.status.set") }}" method="post" name="employee_edit_status">
								<div class="row">
									<div class="col-12">
										<h5>Change Status</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-12 form-group">
										<label for="employee-edit-status">Status</label>
										<div class="input-group mb-3">
											<select class="custom-select form-control" id="employee-edit-status" name="status">
												<option value="1">Active</option>
												<option value="0">Inactive</option>
											</select>
											<div class="input-group-append">
												<button class="btn btn-secondary">Change Status</button>
											</div>
										</div>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<input type="hidden" name="employee_id" data-value="employee_id">
							</form>
							<form action="{{ route("ajax.employee.title.set") }}" method="post" name="employee_edit_title">
								<div class="row">
									<div class="col-12">
										<hr>
										<h5>Change Title</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-12 form-group">
										<label for="employee-edit-title">Title</label>
										@selecttitle("title", ["data-feedback" => "employee-edit-title-feedback", "id" => "employee-edit-title"])
										<div class="invalid-feedback visible" data-feedback-area="employee-edit-title-feedback"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 text-right">
										<button type="submit" class="btn btn-secondary">Change Title</button>
									</div>
								</div>
								<input type="hidden" name="employee_id" data-value="employee_id">
							</form>
							<form action="{{ route("ajax.employee.password.set") }}" method="post" name="employee_edit_password">
								<div class="row">
									<div class="col-12">
										<hr>
										<h5>Change Password</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 form-group">
										<label for="employee-edit-password">New Password</label>
										<input type="password" class="form-control" id="employee-edit-password" name="password">
										<div class="invalid-feedback"></div>
									</div>
									<div class="col-lg-6 form-group">
										<label for="employee-edit-repassword">Repeat Password</label>
										<input type="password" class="form-control" id="employee-edit-repassword" name="repassword">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 text-right">
										<button type="submit" class="btn btn-secondary">Change Password</button>
									</div>
								</div>
								<input type="hidden" name="employee_id" data-value="employee_id">
							</form>
							<form action="{{ route("ajax.employee.manager.assign") }}" method="post" name="employee_assign_manager">
								<div class="row">
									<div class="col-12">
										<hr>
										<h5>Assigned Manager</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-12 form-group">
										<div class="input-group mb-3 selectpicker-form-control">
											<select class="selectpicker form-control show-tick" id="manager-assign-select" name="manager" data-live-search="true" title="None" data-style="custom-select">
											</select>
											<div class="input-group-append">
												<button class="btn btn-secondary">Assign</button>
											</div>
										</div>
									</div>
								</div>
								<input type="hidden" name="employee_id" data-value="employee_id">
							</form>
							<form action="{{ route("ajax.employee.name.set") }}" method="post" name="employee_edit_name">
								<div class="row">
									<div class="col-12">
										<hr>
										<h5>Change Name</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 form-group">
										<label for="employee-edit-fname">First Name</label>
										<input type="text" class="form-control" id="employee-edit-fname" name="fname">
										<div class="invalid-feedback"></div>
									</div>
									<div class="col-lg-4 form-group">
										<label for="employee-edit-mname">Middle Name</label>
										<input type="text" class="form-control" id="employee-edit-mname" name="mname">
										<div class="invalid-feedback"></div>
									</div>
									<div class="col-lg-4 form-group">
										<label for="employee-edit-lname">Last Name</label>
										<input type="text" class="form-control" id="employee-edit-lname" name="lname">
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 text-right">
										<button type="submit" class="btn btn-secondary">Change Name</button>
									</div>
								</div>
								<input type="hidden" name="employee_id" data-value="employee_id">
							</form>
							@admin
								<form action="{{ route("ajax.employee.auth.set") }}" method="post" name="employee_edit_auth">
									<div class="row">
										<div class="col-12">
											<hr>
											<h5>Change Authority</h5>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4 form-group">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="employee-edit-is-manager" name="is_manager" data-feedback="employee-edit-is-manager" value="1">
												<label for="employee-edit-is-manager" class="custom-control-label">Manager</label>
											</div>
											<div class="invalid-feedback" data-feedback-area="employee-edit-is-manager"></div>
										</div>
										<div class="col-lg-4 form-group">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="employee-edit-is-admin" name="is_admin" data-feedback="employee-edit-is-admin" value="1">
												<label for="employee-edit-is-admin" class="custom-control-label">Administrator</label>
											</div>
											<div class="invalid-feedback" data-feedback-area="employee-edit-is-admin"></div>
										</div>
										<div class="col-lg-4 text-right">
											<button type="submit" class="btn btn-secondary">Change Authority</button>
										</div>
									</div>
									<input type="hidden" name="employee_id" data-value="employee_id">
								</form>
							@endadmin
						@endslot
						@slot("practices")
							<div class="row">
								<div class="col-12">
									<h5>Link Practice</h5>
								</div>
							</div>
							<form action="{{ route("ajax.employee.practice.link") }}" method="post" name="employee_edit_practice_link">
								<div class="row">
									<div class="col-12 form-group">
										<label>Practice to Link</label>
										<div class="input-group mb-3 selectpicker-form-control">
											<select class="selectpicker form-control show-tick" id="practice-link-select" name="practice_id" data-live-search="true" title="Select Practice" data-style="custom-select">
											</select>
											<div class="input-group-append">
												<button class="btn btn-secondary">Link Practice</button>
											</div>
										</div>
									</div>
								</div>
								<input type="hidden" name="employee_id" data-value="employee_id">
							</form>
							<form action="{{ route("ajax.employee.practice.unlink") }}" method="post" name="employee_edit_practice_unlink">
								<div class="row">
									<div class="col-12">
										<hr>
										<h5>Linked Practices</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-12 table-responsive-xl">
										<table class="table table-sm table-striped table-hover table-cursor-pointer" id="table-edit-employee-practices">
											<thead>
												<th scope="col">Practice Number</th>
												<th scope="col">Practice Name</th>
												<th scope="col">Status</th>
											</thead>
											<tbody></tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-12 form-group text-right">
										<button class="btn btn-danger">Unlink Selected</button>
									</div>
								</div>
								<input type="hidden" name="employee_id" data-value="employee_id">
							</form>
						@endslot
					@endcomponent
				</div>
			</div>
			<div class="modal-footer">
				<a href="" target="_blank" class="btn btn-secondary" id="print-employee">Print</a>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
