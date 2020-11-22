<div class="modal fade" id="modal-practice-add" tabindex="-1" role="dialog" aria-labelledby="modal-practice-add-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="<?php echo e(route("ajax.practice.add")); ?>" method="post" name="practice_add">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-practice-add-title">Add New Practice</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 form-group">
								<label for="practice-add-name">Practice Name</label>
								<input type="text" class="form-control" id="practice-add-name" name="name">
								<div class="invalid-feedback"></div>
							</div>
							<div class="col-lg-6 form-group">
								<label for="practice-add-number">Practice Number</label>
								<input type="text" class="form-control" id="practice-add-number" name="number">
								<div class="invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<hr>
								<h5>Physicians</h5>
							</div>
						</div>
						<div data-dynamic-template='physicians' data-dynamic-area='physicians'></div><div class='row'><div class='col-md-12 form-group'><button class='btn btn-outline-primary' data-dynamic-action='add' type='button' data-dynamic-group='physicians'>Add Physician</button></div></div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-secondary">Add Practice</button>
				</div>
			</form>
		</div>
	</div>
</div>
