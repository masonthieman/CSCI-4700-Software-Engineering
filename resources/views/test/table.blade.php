@extends("base.master")
@section("body")
    <div class="container bg-white">
        <div class="row">
            <div class="col-12">
                <h2 class="page-heading">Test Table</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <input type="text" id="test-table-search" class="form-control" placeholder="Search...">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @table([
                    "name"           => "test_table",
                    "columns"        => ["id", "fname", "mname", "lname"],
                    "dateIndex"      => Null,
                    "keywordIndices" => ["fname", "mname", "lname", "renova_id", "title"],
                    "data"           => $employees,
                    "pagination"     => True,
                    "page"           => 0,
                    "perPage"        => 15,
                    "clickable"      => True
                ])
            </div>
        </div>
    </div>
@endsection
@push("scripts")
    <script>
        $(document).ready(function() {
            table("test_table").click(function(data) {
                console.log("The table has been clicked", data);
            });
            $("#test-table-search").keyup(function() {
                table("test_table").setKeywordFilter($(this).val());
            });
        });
    </script>
@endpush
