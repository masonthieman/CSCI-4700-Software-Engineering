<div class="modal fade" id="modal-employee-add" tabindex="-1" role="dialog" aria-labelledby="modal-employee-add-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="<?php echo e(route("employee_add")); ?>" method="post" name="employee_add">
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
								<?php
                $params     = ["title", ["data-feedback" => "title-feedback", "id" => "employee-add-title"]];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = [];
                foreach (App\Models\EmployeeTitle::orderBy("title")->get() as $title) {
                    $options[$title->id] = $title;
                }
                echo App\Support\Form::selectOrOther("Title", $name, $options, $attributes, $selected);
            ?>
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
							<div class="col-lg-6 form-check"> 
								<?php
                $params     = ["Manager", "is_manager", "is-manager"];
                $label      = $params[0];
                $name       = $params[1];
                $id         = $params[2];
                $value      = defaultParameter($params, 3, 1);
                $attributes = defaultParameter($params, 4, []);
                $checked    = defaultParameter($params, 5, False);
                echo \App\Support\Form::checkBox($name, $id, $label, $value, $attributes, $checked);
            ?>
								<?php
                $params     = ["Administrator", "is_admin", "is-admin"];
                $label      = $params[0];
                $name       = $params[1];
                $id         = $params[2];
                $value      = defaultParameter($params, 3, 1);
                $attributes = defaultParameter($params, 4, []);
                $checked    = defaultParameter($params, 5, False);
                echo \App\Support\Form::checkBox($name, $id, $label, $value, $attributes, $checked);
            ?>
							</div>
							<div class="col-lg-6 form-group"> 
								<label for="employee-manager-add">Assigned Manager</label>
								<?php
                $params     = ["manager", ["id" => "manager-add"]];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = [];
                $auths      = App\Models\EmployeeAuth::managers()->get();
                foreach ($auths as $auth) {
                    $employee = $auth->employee;
                    $options[$employee->id] = $employee->esig();
                }
                echo App\Support\Form::selectSearchable("None", $name, $options, $attributes, $selected);
            ?>
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
