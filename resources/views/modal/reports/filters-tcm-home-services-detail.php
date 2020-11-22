<div class="modal fade" id="modal-tcm-home-services-detail-filter" tabindex="-1" role="dialog" aria-labelledby="modal-tcm-home-services-detail-filter-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="#" method="post" name="tcm_home_services_detail_filter">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-tcm-home-services-detail-title">Filter Home Services</h5>
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