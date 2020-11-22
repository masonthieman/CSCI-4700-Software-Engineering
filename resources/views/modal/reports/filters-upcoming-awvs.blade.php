<div class="modal fade" id="modal-upcoming-awv-filter" tabindex="-1" role="dialog" aria-labelledby="modal-upcoming-awv-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="#" method="post" name="upcoming_awv_filter">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-upcoming-awv-title">Filter Upcoming AWV's</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<h5>Select Month of Upcoming AWV's Due</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<select-month name="month"></select-month>
							</div>
							<div class="col-md-4">
								<select-year name="year"></select-year>
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
