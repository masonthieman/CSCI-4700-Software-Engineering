@extends("base.master")
@section("body")
    <div class="container bg-white">
        <div class="row">
            <div class="col-12">
                <h2 class="page-heading">Care Plan Templates</h2>
            </div>
        </div>
        <div class="form-row">
            @if (Auth::user() && Auth::user()->is_admin)
                <div class="col-6 col-lg-8 form-group">
                    <input type="text" class="form-control" id="care-plan-templates-search" placeholder="Search">
                </div>
                <div class="col-6 col-md-4 form-group">
                    <button type="button" class="btn btn-primary btn-block"  id="care-plan-template-add-button">Add Care Plan Templates</button>
                </div>
            @else
                <div class="col-12 form-group">
                    <input type="text" class="form-control" id="care-plan-templates-search" placeholder="Search">
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12 table-responsive-xl">
                @table([
                    "name"          => "care_plan_templates",
                    "clickable"     => True,
                    "columns"       => [
                        "name", 
                        "icd10"
                    ],
                    "keywordIndices" => [
                        "name", 
                        "icd10"
                    ]
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <form action="{{ route("print-table") }}" method="post" target="_blank" id="print-care-plan-templates">
                    @csrf
                    <input type="hidden" name="name" id="table-care-plan-templates-name" value="">
                    <input type="hidden" name="columns" id="table-care-plan-templates-columns" value="[]">
                    <input type="hidden" name="data" id="table-care-plan-templates-data" value="[]">
                    <input type="hidden" name="boolean_fields" id="table-care-plan-templates-boolean-fields" value="[]">
                    <button type="submit" class="btn btn-primary">Print</button>
                </form>
            </div>
        </div>
    </div>
    @include("modal.wait")
@endsection
@push("dynamic_templates")
    <div class="row" data-dynamic-template-id="check_specify">
        <div class="col-12 form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <select name="type" class="custom-select">
                        <option value="0">Check Only</option>
                        <option value="1">Descriptive</option>
                    </select>
                </div>
                @text("description", ["data-feedback" => "description_feedback", "placeholder" => "Option description...", "onkeydown" => "onKeyPress(this, event);"])
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger" data-dynamic-action="remove">Remove</button>
                </div>
            </div>
            <div class="invalid-feedback visible" data-feedback-area="description_feedback"></div>
        </div>
    </div>
@endpush
@push("scripts")
    <script>
        $(document).ready(function() {
            careplans.init();
            $("#print-care-plan-templates").submit(function() {
                var t = table("care_plan_templates");
                $("#table-care-plan-templates-name").val("care_plan_templates");
                $("#table-care-plan-templates-columns").val(JSON.stringify(t.columns()));
                $("#table-care-plan-templates-data").val(JSON.stringify(t.filteredData()));
                $("#table-care-plan-templates-boolean-fields").val(JSON.stringify(t.booleanFields()));
            });
        });
    </script>
@endpush