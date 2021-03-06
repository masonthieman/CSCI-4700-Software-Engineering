<div class="modal fade" id="modal-tcm-admit-discharge-admission-facility-type-filter" tabindex="-1" role="dialog" aria-labelledby="modal-tcm-admit-discharge-admission-facility-type-filter-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="#" method="post" name="tcm_admit_discharge_admission_facility_type_filter">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-tcm-admit-discharge-admission-facility-type-filter">Filter Admit / Discharge</h5>
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
								<h5>By Physician</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								@selectphysician("physician_id")
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<hr>
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