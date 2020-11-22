<div class="modal fade" id="modal-care-plan-edit" tabindex="-1" role="dialog" aria-labelledby="modal-care-plan-edit-title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-employee-care-plan-title">Edit Care Plan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">

					<form action="" method="post" name="care_plan_edit_template_form">
			            @isset($template)
			                @method("PUT")
			            @endisset
			            @csrf
			            @isset($template)
			                <input type="hidden" name="id" value="{{ $template->id }}">
			            @endisset
			            <div class="row">
			                <div class="col-12">
			                    @isset($template)
			                        <h2 class="page-heading">Update Care Plan Template</h2>
			                    @endisset
			                </div>
			            </div>
			            <div class="row">
			                <div class="col-md-6 form-group">
			                    <label>Condition Name</label>
			                    @text("name")
			                </div>
			                <div class="col-md-6 form-group">
			                    <label>ICD-10</label>
			                    @text("icd10")
			                </div>
			            </div>
			            @divider
			            <div class="row">
			                <div class="col-12">
			                    <h5>Symptoms - (Check all that apply)</h5>
			                </div>
			            </div>
			            @dynamicarea("symptoms", "check_specify", "Symptom")
			            @divider
			            <div class="row">
			                <div class="col-12">
			                    <h5>Goals - (Check all that apply)</h5>
			                </div>
			            </div>
			            @dynamicarea("goals", "check_specify", "Goal")
			            @divider
			            <div class="row">
			                <div class="col-12">
			                    <h5>Tasks - (Check all that apply)</h5>
			                </div>
			            </div>
			            @dynamicarea("tasks", "check_specify", "Task")
			            @divider
			            <div class="row">
			                <div class="col-12">
			                    <h5>Resources - (Check all that apply)</h5>
			                </div>
			            </div>
			            @dynamicarea("resources", "check_specify", "Resource")
			            @divider
			            <div class="row">
			                <div class="col-12">
			                    <h5>Tracking - (Check all that apply)</h5>
			                </div>
			            </div>
			            @dynamicarea("tracking", "check_specify", "Tracking")
			            <div class="row">
			                <div class="col-12 text-right form-group">
			                    <a class="btn btn-primary" href="{{ route("care_plan.templates") }}">Cancel</a>
			                    @isset($template)
			                        <button type="button" class="btn btn-danger" id="delete-template">Delete Template</button>
			                        <button type="submit" class="btn btn-secondary">Update Template</button>
			                    @endisset
			                </div>
			            </div>
			        </form>
				</div>
			</div>
			<div class="modal-footer">
				<a href="" target="_blank" class="btn btn-secondary" id="print-care-plan">Print</a>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
