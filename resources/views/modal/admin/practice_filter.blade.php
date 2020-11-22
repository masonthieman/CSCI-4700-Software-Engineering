<div class="modal fade" id="modal-practice-filter" tabindex="-1" role="dialog" aria-labelledby="modal-practice-filter-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="#" method="post" name="practice_filter">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-practice-filter-title">Filter Practices</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<h5>By Practice Status</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								@checkbox("Active", "active", "practice-filter-active")
							</div>
							<div class="col-6">
								@checkbox("Inactive", "inactive", "practice-filter-inactive")
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