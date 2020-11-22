<div class="modal fade" id="modal-care-plan-add" tabindex="-1" role="dialog" aria-labelledby="modal-care-plan-add-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form action="{{ route("ajax.care_plan.templates.fetch") }}" method="get" name="ajax.care_plan.templates.fetch_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-care-plan-add-title">Attach Care Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        @selectsearch("Condition", "id", $conditions)
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary">Attach</button>
                </div>
            </div>
        </form>
	</div>
</div>
