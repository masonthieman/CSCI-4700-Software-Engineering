<div class="modal fade" id="modal-billings-iccm-filter" tabindex="-1" role="dialog" aria-labelledby="modal-billings-iccm-filter-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="#" method="post" name="billings_iccm_filter">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-billings-iccm-filter-title">Filter Billings</h5>
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
						{{-- <div class="row">
							<div class="col-12">
								<hr>
								<h5>By Codes</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								@checkbox("Initial iccm (G0438)", "iccm_initial", "billings-iccm-filter-iccm-initial")
							</div>
							<div class="col-4">
								@checkbox("Subsequent iccm (G0439)", "iccm_updated", "billings-iccm-filter-iccm-updated")
							</div>
							<div class="col-4">
								@checkbox("Advanced Care Plan (99497)", "advanced_care_plan", "billings-iccm-filter")
							</div>
							<div class="col-4">
								@checkbox("Care Plan Development (G0506)", "care_plan_development", "billings-iccm-filter-care-plan-development")
							</div>
							<div class="col-4">
								@checkbox("Other", "other", "billings-iccm-filter-other")
							</div>
						</div> --}}
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
