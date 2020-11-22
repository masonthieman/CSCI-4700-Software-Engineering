<div class="modal fade" id="modal-practice-edit" tabindex="-1" role="dialog" aria-labelledby="modal-practice-edit-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-practice-edit-title">Edit Practice</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form action="<?php echo e(route("ajax.practice.status.set")); ?>" method="post" name="practice_edit_status">
						<div class="row">
							<div class="col-12">
								<h5>Change Status</h5>
							</div>
						</div>
						<div class="row align-items-end">
							<div class="col-lg-9 form-group">
								<label for="practice-edit-status">Status</label>
								<select name="status" id="practice-edit-status" class="custom-select">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
								<div class="invalid-feedback"></div>
							</div>
							<div class="col-lg-3 text-right form-group">
								<button type="submit" class="btn btn-secondary">Change Status</button>
							</div>
						</div>
						<input type="hidden" name="id" data-value="practice_id">
					</form>
					<div class="row">
						<div class="col-12">
							<hr>
							<h5>Physicians</h5>
						</div>
					</div>
					<form action="<?php echo e(route("ajax.practice.physicians.set")); ?>" method="post" name="practice_edit_physicians">
						<div data-dynamic-template='physicians' data-dynamic-area='edit_physicians'></div><div class='row'><div class='col-md-12 form-group'><button class='btn btn-outline-primary' data-dynamic-action='add' type='button' data-dynamic-group='edit_physicians'>Add Physician</button></div></div>
						<div class="row">
							<div class="col-12 text-right">
								<button class="btn btn-secondary">Set Physicians</button>
							</div>
						</div>
						<input type="hidden" name="id" data-value="practice_id">
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<a href="" target="_blank" class="btn btn-secondary" id="print-practice">Print</a>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
