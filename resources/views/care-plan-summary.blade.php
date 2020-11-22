@extends("base.master")
@section("body")
    <div class="container summary-container bg-white">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-heading">CARE PLAN SUMMARY</h1>
            </div>
        </div>
        <form action="{{ route("ajax.summary.save") }}" method="post" name="summary_form">
            @csrf
            @header("Demographics")
            <div class="row">
                <div class="form-group col-12">
                    <label>Select Patient</label>
                    @selectpatient("patient_id")
                </div>
            </div>
            @include("form.patient-information")
            @divider
            @include("form.vital-signs")
            @divider
            @include("form.advanced-directives")
            @divider
            @include("form.providers")
            @divider
            @include("form.adl")
            @divider
            @include("form.medication-list", ["hide_pharmacy" => True])
            @divider
            @include("form.allergies")
            @divider
            @include("form.immunizations")
            @divider
            @include("form.routine-screenings")
            @header("Screening Recommendations")
            @divider
            @include("form.preventive-services")
            @divider
            @include("form.referrals-to-programs")
            @divider
            @include("form.risk-factors")
            @divider
            @include("form.psychosocial-issues")
            @divider
            @include("form.chronic-conditions")
            @divider
            @header("Care Plans")
            <div id="care-plan-values"></div>
            <div class="row">
                <div class="col-12">
                    @table([
                    "name"       => "care_plans",
                    "columns"    => ["name", "icd10", "date"],
                    "pagination" => false,
                    "clickable"  => true
                    ])
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-care-plan-add">Attach Care Plan</button>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-primary" id="care-plans-print">Print Care Plans</button>
                </div>
            </div>
            @divider
            @include("form.other-notes")
            @divider
            @include("form.completed-by")
            <div class="row">
                <div class="col-sm-6 form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="is_initial" readonly>
                        <label for="is-initial" class="custom-control-label">Initial</label>
                    </div>
                </div>
                <div class="col-sm-6 text-right form-group">
                    <button class="btn btn-secondary">Save</button>
                    <button class="btn btn-primary" type="button" id="summary-submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    @include("modal.summary.care_plan_add", compact("conditions"))
    @include("modal.summary.care_plan_edit")
@endsection

@push("scripts")
    <script>
     $(document).ready(function() {
         summary.init();
     });
    </script>
@endpush
