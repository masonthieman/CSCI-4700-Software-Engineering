<div class="modal fade" id="modal-care-plans-initial-filter" tabindex="-1" role="dialog" aria-labelledby="modal-care-plans-initial-filter-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="#" method="post" name="care_plans_initial_filter">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-care-plans-initial-filter-title">Filter Initial Care Plans</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<h5>By Employee</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								@selectemployee("employee")
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
								@selectpractice("practice")
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
