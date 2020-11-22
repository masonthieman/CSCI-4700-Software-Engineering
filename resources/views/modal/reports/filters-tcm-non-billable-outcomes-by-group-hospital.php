<div class="modal fade" id="modal-tcm-non-billable-outcoes-by-group-hospital-filter" tabindex="-1" role="dialog" aria-labelledby="modal-tcm-non-billable-outcomes-by-group-hospital-filter-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="#" method="post" name="tcm_non_billable_outcomes_by_group_hospital_filter">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-tcm-non-billable-outcomes-by-group-hospital-title">Filter Non-Billable Outcomes</h5>
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
								<h5>By Physician / Group Name</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								@selectphysician("physician_id")
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<h5>By Hospital</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								@selecthospital("hName")
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