@extends("base.master")
@section("body") 
<div class="container bg-white">
<div class="row">
    <div class="col-12">
        <h2 class="page-heading">Patient List</h2>
    </div>
</div>

<div class="row">
		<input class="form-control" id="myInput" type="text" placeholder="Search..">
	</div>
	
<div class="row">    
    <div class="col-12">
        @table([            
            "name"           => "patients",
            "columns"        => ["lname", "fname", "dob"],
            "keywordIndices" => ["lname", "fname", "dob"],
            "clickable"      => True
        ])
    </div>
    </div>  
</div>  
@endsection

@push("scripts")
	<script>
		$(document).ready(function() {
			patientList.init();
		});
	</script>
@endpush

