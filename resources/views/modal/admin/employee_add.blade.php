<div class="modal fade" id="modal-employee-add" tabindex="-1" role="dialog" aria-labelledby="modal-employee-add-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="{{ route("employee_add") }}" method="post" name="employee_add">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-employee-add-title">Add New Employee</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 form-group">
								<label for="employee-add-fname">First Name</label>
								<input type="text" class="form-control" id="employee-add-fname" name="fname" autocomplete="off">
								<div class="invalid-feedback"></div>
							</div>
							<div class="col-lg-6 form-group">
								<label for="employee-add-lname">Last Name</label>
								<input type="text" class="form-control" id="employee-add-lname" name="lname" autocomplete="off">
								<div class="invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 form-group">
								<label for="employee-add-mname">Middle Name <small>(Optional)</small></label>
								<input type="text" class="form-control" id="employee-add-mname" name="mname" autocomplete="off">
								<div class="invalid-feedback"></div>
							</div>
							<div class="col-lg-6 form-group">
								<label for="employee-add-title">Title</label>
								@selecttitle("title", ["data-feedback" => "title-feedback", "id" => "employee-add-title"])
								<div class="invalid-feedback visible" data-feedback-area="title-feedback"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 form-group">
								<label for="employee-add-renova-id">Renova ID</label>
								<input type="text" class="form-control" id="employee-add-renova-id" name="renova_id" autocomplete="off">
								<div class="invalid-feedback"></div>
							</div>
							<div class="col-lg-6 form-group">
								<label for="employee-add-email">Email</label>
								<input type="email" class="form-control" id="employee-add-email" name="email" autocomplete="off">
								<div class="invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 form-group">
								<label for="employee-add-password">Password</label>
								<input type="password" class="form-control" id="employee-add-password" name="password" autocomplete="off">
								<div class="invalid-feedback"></div>
							</div>
							<div class="col-lg-6 form-group">
								<label for="employee-add-repassword">Repeat Password</label>
								<input type="password" class="form-control" id="employee-add-repassword" name="repassword" autocomplete="off">
								<div class="invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 form-check"> {{-- For some reason the form-check has to be split off --}}
								@checkbox("Manager", "is_manager", "is-manager")
								@checkbox("Administrator", "is_admin", "is-admin")
							</div>
							<div class="col-lg-6 form-group"> {{-- For some reason the form-check has to be split off --}}
								<label for="employee-manager-add">Assigned Manager</label>
								@selectmanager("manager", ["id" => "manager-add"])
								<div class="invalid-feedback"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-secondary">Add Employee</button>
				</div>
			</form>
		</div>
	</div>
</div>
