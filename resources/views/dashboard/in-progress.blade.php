@extends("base.master")
@section("body") 
<div class="container bg-white">
<div class="row">
    <div class="col-12">
        <h2 class="page-heading">In Progress Status Patients</h2>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @table([
            "name"           => "patients",
            "columns"        => ["lname", "fname", "email", "phone_primary", "addr1", "city", "state"],
            "keywordIndices" => ["lname", "fname", "email", "phone_primary", "addr1", "city", "state"],
            "clickable"      => True
        ])
    </div>
    </div>  
</div>  
@endsection

@push("scripts")
	<script>
		$(document).ready(function() {
            inProgress.init();
		});
	</script>
@endpush
