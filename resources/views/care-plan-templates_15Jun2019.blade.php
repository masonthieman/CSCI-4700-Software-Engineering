@extends("base.master")
@section("body")
    <div class="container bg-white">
        <div class="row">
            <div class="col-12">
                <h2 class="page-heading">Care Plan Templates</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <input type="text" id="care-plan-templates-search" class="form-control" placeholder="Search...">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @table([
                    "name"           => "care_plan_templates",
                    "columns"        => ["name", "icd10","options"],
                    "clickable"      => True,
                    "data"           => $templates,
                    "keywordIndices" => ["name", "icd10"]
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-right form-group">
                 <a href="{{ route("care_plan.templates.create") }}" class="btn btn-primary">New Template</a> 
            </div>
        </div>
    </div>
    @include("modal.wait")
    @include("modal.care-plan.care_plan_edit")
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            /* table("care_plan_templates").click(function(data) {
                window.location.href = data.url;
            }); */
            $("#care-plan-templates-search").keyup(function() {
                table("care_plan_templates").setKeywordFilter($(this).val());
            });
        });
    </script>
@endsection
