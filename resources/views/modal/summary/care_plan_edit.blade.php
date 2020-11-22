<div class="modal fade" id="modal-care-plan-edit" tabindex="-1" role="dialog" aria-labelledby="modal-care-plan-edit-title" aria-hidden="true" data-careplan-id="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-care-plan-edit-title">Care Plan Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label>ICD-10 Number (Default: <span id="modal-care-plan-edit-icd10"></span>)</label>
                            @text("icd10", ["placeholder" => "Adjust ICD-10 Number..."])
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Date</span>)</label>
                            @date("date", ["placeholder" => "(Default Today) Date"])
                        </div>
                    </div>
                    @divider
                    <div class="row">
                        <div class="col-12">
                            <h4>Symptoms</h4>
                        </div>
                    </div>
                    <div id="modal-care-plan-edit-symptoms"></div>
                    @dynamicarea("care_plan_symptoms", "care_plan_other", "Symptom")
                    @divider
                    <div class="row">
                        <div class="col-12">
                            <h4>Goals</h4>
                        </div>
                    </div>
                    <div id="modal-care-plan-edit-goals"></div>
                    @dynamicarea("care_plan_goals", "care_plan_other", "Goal")
                    @divider
                    <div class="row">
                        <div class="col-12">
                            <h4>Tasks</h4>
                        </div>
                    </div>
                    <div id="modal-care-plan-edit-tasks"></div>
                    @dynamicarea("care_plan_tasks", "care_plan_other", "Task")
                    @divider
                    <div class="row">
                        <div class="col-12">
                            <h4>Physicians and Specialists</h4>
                        </div>
                    </div>
                    @dynamicarea("care_plan_physicians", "care_plan_physician", "Physician/Specialist")
                    @divider
                    <div class="row">
                        <div class="col-12">
                            <h4>Pharmacies</h4>
                        </div>
                    </div>
                    @dynamicarea("care_plan_pharmacies", "care_plan_pharmacy", "Pharmacy")
                    @divider
                    <div class="row">
                        <div class="col-12">
                            <h4>Medications</h4>
                        </div>
                    </div>
                    @dynamicarea("care_plan_medications", "care_plan_medication", "Medication")
                    @divider
                    <div class="row">
                        <div class="col-12">
                            <h4>Resources</h4>
                        </div>
                    </div>
                    <div id="modal-care-plan-edit-resources"></div>
                    @dynamicarea("care_plan_resources", "care_plan_other", "Resource")
                    @divider
                    <div class="row">
                        <div class="col-12">
                            <h4>Tracking</h4>
                        </div>
                    </div>
                    <div id="modal-care-plan-edit-tracking"></div>
                    @dynamicarea("care_plan_tracking", "care_plan_other", "Tracking")
                </div>
            </div>
            <div class="modal-footer" style="padding-bottom: 0;">
                <div class="container-fluid">
                    <div class="form-row">
                        <div class="col-lg-3 form-group">
                            <button type="button" class="btn btn-block btn-danger" id="modal-care-plan-edit-remove">Remove</button>
                        </div>
                        <div class="col-lg-3 form-group">
                            <button type="button" class="btn btn-block btn-primary" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-lg-3 form-group">
                            <button type="button" class="btn btn-block btn-primary" id="modal-care-plan-print">Print</button>
                        </div>
                        <div class="col-lg-3 form-group">
                            <button type="submit" class="btn btn-block btn-secondary" id="modal-care-plan-edit-save">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@push("dynamic_templates")
    <div data-dynamic-template-id="care_plan_other" class="row dynamic-form">
        <div class="col-12 form-group">
            <div class="input-group">
                <input type="text" name="option" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-danger" data-dynamic-action="remove">Remove</button>
                </div>
            </div>
        </div>
    </div>
    <div data-dynamic-template-id="care_plan_physician" class="row dynamic-form align-items-end">
        <div class="col-md-3 form-group">
            <label>Name</label>
            @text('value0')
        </div>
        <div class="col-md-3 form-group">
            <label>Phone Number</label>
            @phone("value1", ["data-feedback" => "_"])
        </div>
        <div class="col-md-4 form-group">
            <label>Specialty</label>
            @text('value2')
        </div>
        <div class="col-md-2 form-group">
            <button class="btn btn-danger btn-block" data-dynamic-action="remove">Remove</button>
        </div>
    </div>
    <div data-dynamic-template-id="care_plan_pharmacy" class="row dynamic-form align-items-end">
        <div class="col-md-5 form-group">
            <b><span data-dynamic-index></span>.</b>
            <label>Name</label>
            <input type="text" name="value0" class="form-control">
        </div>
        <div class="col-md-5 form-group">
            <label>Phone Number</label>
            @phone("value1", ["data-feedback" => "_"])
        </div>
        <div class="col-md-2 form-group">
            <button class="btn btn-danger btn-block" data-dynamic-action="remove">Remove</button>
        </div>
    </div>
    <div data-dynamic-template-id="care_plan_medication" class="row dynamic-form align-items-end">
        <div class="col-md-3 form-group">
            <label>Pharmacy</label>
            <select name="value0" class="custom-select"></select>
        </div>
        <div class="col-md-9 form-group">
            <label>Name</label>
            <input type="text" name="value1" class="form-control">
        </div>
        <div class="col-md-5 form-group">
            <label>Dose</label>
            <input type="text" name="value2" class="form-control">
        </div>
        <div class="col-md-5 form-group">
            <label>Frequency</label>
            @selectmedabbrev('value3')
        </div>
        <div class="col-md-2 form-group">
            <button class="btn btn-danger btn-block" data-dynamic-action="remove">Remove</button>
        </div>
        <div class='col-12'><hr></div>
    </div>
@endpush
