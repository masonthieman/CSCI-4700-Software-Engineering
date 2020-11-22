@extends("base.master")
@section("body")
    <div class="container bg-white">
        <div class="row">
            <div class="col-12">
                <h2 class="page-heading">TCM Reports</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 form-group">
                <label for="reports-category">Choose Reports Category</label>
                <select class="custom-select" id="reports-category">
                    <option value="">Select Reports</option>
                    <option value="admission-facility-type">Admission Facility Type</option>
                    <option value="discharged-to">Discharged To</option>
                    <option value="discharged-to-detail">Discharged To Detail</option>
                    <option value="readmission">Readmission</option>
                    <option value="readmission-detail">Readmission Detail</option>
                    <option value="initial-contact-missed-untimely">Initial Contact Missed/Untimely</option>
                    <option value="face-to-face-not-completed">Face to Face Not Completed</option>
                    <option value="outcomes-other">Outcomes Other</option>
                    <option value="by-hospital-group-billable">By Hospital/Group-Billable</option>
                    <option value="by-hospital-group-billable-detail">By Hospital/Group Detail-Billable</option>
                    <option value="med-reconciliation-outcome">Med Reconciliation Outcome</option>
                    <option value="med-reconciliation-outcome-detail"> Med Reconciliation Outcome Detail</option>
                    <option value="med-rec-compliance-issues">Med Rec-Compliance Issues</option>
                    <option value="non-billable-outcome-by-group-hostpital"> Non Billable Outcomes By Group/Hospital</option>
                    <option value="non-billable-outcome-by-group-hostpital-detailed">Non Billable Outcomes By Group/Hospital Detailed</option>
                    <option value="home-services">Home Services</option>
                    <option value="home-services-detailed">Home Services-Detail </option>
                     
                </select>
            </div>
            <div class="col-lg-2 form-group">
                <label for="date-start">Filter by Date</label>
                <select class="custom-select" id="type">
                  <option value="">Select Date Format</option>
                  <option value="MTD">MTD</option>
                  <option value="YTD">YTD</option>
                  <option value="Date-Range">Date Range</option>
              </select>
            </div>
            <div class="col-2">
                <label for="date-start">Start Date</label>
                <div class="input-group">
                    <input readonly type="date" class="form-control" id="date-start">
                </div>
            </div>        
            <div class="col-2">
                <label for="date-end">End Date</label>
                <div class="input-group">
                <input readonly type="date" class="form-control" id="date-end">
                </div>
            </div>  
                    
                
            
        </div>
        <div class="row">
            <div class="col-3">
            <label>By Practice</label>
                @selectpractice("practice", ["id" => "practice"])
            </div>
            <div class="col-2">
            <label>By Hospital</label>
                @selecthospital("hospital", ["id" => "hospital"])
            </div>
        </div>
        <hr>          
        <div class="row">
            <div class="col-12" id="pdatatableContent">
				<table id="patients" width="100%" name="patients" class="table table-striped bg-white table-hover table-cursor-pointer">
                    <tbody></tbody>
                </table>
            </div>
        </div>
		<!--
        <div class="row">
            <div class="col-4 form-group text-right">
                <form action="{{ route("print-table") }}" method="post" target="_blank" id="print-form">
                    @csrf
                    <button type="submit" class="btn btn-primary" id="print_button" hidden>Print</button>
                    <input type="hidden" name="name" id="table-name" value="">
                    <input type="hidden" name="columns" id="table-columns" value="[]">
                    <input type="hidden" name="data" id="table-data" value="[]">
                </form>
            </div>
        </div>
		-->
    </div>
@endsection
@push("scripts")
    <script>
        $(document).ready(function() {
            tcmReports.init();

            $("#print-form").submit(function() {
                var t = table("tcm_reports");
                $("#table-name").val("tcm_reports");
                $("#table-columns").val(JSON.stringify(t.columns()));
                $("#table-data").val(JSON.stringify(t.filteredData()));
            });
        });
    </script>
@endpush
