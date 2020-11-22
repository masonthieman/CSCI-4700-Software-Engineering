<div class="modal fade" id="patientListing" tabindex="-1" role="dialog" aria-labelledby="modal-employee-add-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-employee-add-title">Patient List</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row" id="tables">
						<div class="col-12">
							<table id="patients" width="100%" name="patients" class="table table-striped bg-white table-hover table-cursor-pointer">
								<tbody></tbody>
							</table>
							<!--
							@table([
								"name"           => "patients",
								"columns"        => ["lname", "fname",  "email", "phone_primary", "addr1", "city", "state"],
								"keywordIndices" => ["lname", "fname",  "email", "phone_primary", "addr1", "city", "state"],
								"clickable"      => False
							]) -->
						</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					
				</div>			
		</div>
	</div>
</div>
