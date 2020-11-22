@extends("base.master")
@section("body")
    <div class="container bg-white">
        <div class="row">
            <div class="col-12">
                <h2 class="page-heading">Reports</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 form-group">
                <label for="reports-category">Choose Reports Category</label>
                <select class="custom-select" id="reports-category">
                    <option value="">Select Reports</option>
                    <option value="billings-awv">Billing - AWV</option>
                    <option value="billings-iccm">Billing - ICCM</option>
                    <option value="care-plans-initial">Initial Care Plans</option>
                    <option value="care-plans-updated">Updated Care Plans</option>
                    <option value="registrations">Registrations</option>
                    <option value="tcm-billable-by-hospital-group">TCM - Billable By Hospital Group</option>
                    <option value="tcm-billable-by-hospital-group-detail">TCM - Billable by Hospital Group - Detail</option>
                    <option value="tcm-admit-discharge-admission-facility-type">TCM - Admit/Discharge - Admission Facility Type</option>
                    <option value="tcm-admit-discharge-discharge-to">TCM - Admit/Discharge - Discharge To</option>
                    <option value="tcm-admit-discharge-discharge-to-detail">TCM - Admit/Discharge - Discharge To Type</option>
                    <option value="tcm-non-billable-outcomes-by-group-hospital">TCM - Non-Billable Outcomes by Group/Hospital</option>
                    <option value="tcm-non-billable-outcomes-by-group-hospital-detail">TCM - Non-Billable Outcomes by Group/Hospital Detail</option>
                    <option value="tcm-home-services">TCM - Home Services</option>
                    <option value="tcm-home-services-detail">TCM - Home Services Detail</option>
                    <option value="upcoming-awvs">Upcoming AWV</option>
                </select>
            </div>
            <div class="col-lg-6 form-group">
                <label for="date-start">Filter by Date (Start-End)</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="date-start">
                    <input type="date" class="form-control" id="date-end">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <label for="keywords">Filter Reports</label>
                @text("keywords", ["id" => "keywords", "placeholder" => "Keyword filter..."])
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <button id="filter-button" type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-billing-filter">Edit Filters</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @table([
                    "name"           => "reports",
                    "columns"        => ["date_display", "practice_name", "lname", "fname", "dob", "esignature"],
                    "dateIndex"      => "date_display",
                    "keywordIndices" => ["practice_name", "lname", "fname", "dob", "esignature"],
                    "clickable"      => True
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-8 form-group" id="records">
                Total Records: 0
            </div>
            <div class="col-4 form-group text-right">
                <form action="{{ route("print-table") }}" method="post" target="_blank" id="print-form">
                    @csrf
                    <input type="hidden" name="name" id="table-name" value="">
                    <input type="hidden" name="columns" id="table-columns" value="[]">
                    <input type="hidden" name="data" id="table-data" value="[]">
                    <button type="submit" class="btn btn-primary">Print</button>
                </form>
            </div>
        </div>
    </div>
    @include("modal.reports.filters-registrations")
    @include("modal.reports.filters-care-plans-initial")
    @include("modal.reports.filters-care-plans-updated")
    @include("modal.reports.filters-billings-awv")
    @include("modal.reports.filters-billings-iccm")

    @include("modal.reports.filters-tcm-billable-by-hospital-group")
    @include("modal.reports.filters-tcm-billable-by-hospital-group-detail")
    @include("modal.reports.filters-tcm-admit-discharge-admission-facility-type")
    @include("modal.reports.filters-tcm-admit-discharge-discharge-to")
    @include("modal.reports.filters-tcm-admit-discharge-discharge-to-detail")
    @include("modal.reports.filters-tcm-non-billable-outcomes-by-group-hospital")
    @include("modal.reports.filters-tcm-non-billable-outcomes-by-group-hospital-detail")
    @include("modal.reports.filters-tcm-home-services")
    @include("modal.reports.filters-tcm-home-services-detail")
    @include("modal.reports.filters-upcoming-awvs")
    @include("modal.wait")
@endsection
@push("scripts")
    <script>
        $(document).ready(function() {
            reports.init();

            $("#print-form").submit(function() {
                var t = table("reports");
                $("#table-name").val("reports");
                $("#table-columns").val(JSON.stringify(t.columns()));
                $("#table-data").val(JSON.stringify(t.filteredData()));
            });
        });
    </script>
@endpush
