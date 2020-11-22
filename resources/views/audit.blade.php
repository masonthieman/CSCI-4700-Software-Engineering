@extends("base.master")
@section("body")
<div class="container login-container bg-white ml-auto mr-auto">

    @if (session("audit_create"))
        <div class="alert alert-success">
            {{ session('audit_create') }}
        </div>
    @endif

        @if (session("audit_not_found"))
            <div class="alert alert-danger">
                {{ session('audit_not_found') }}
            </div>
        @endif
    <div class="row">
        <div class="col-10">
            <h2 class="page-heading">Search Audit</h2>
        </div>
        <div class="col-2">
            <button class="btn">
                <a href="{{ route("create-audit") }}" class="col-12"><i class="fa fa-plus-square"></i></a>
            </button>
        </div>
    </div>
    <form action="{{ route("audit-search") }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 form-group">
                <label>Select Table Name</label>
                @selecttable("table")
                <small class="audit-form-errors">{{ $errors->first('table') }}</small>
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label>Select Table Operation</label>
				@select("Operation", "operation", [
					"C" => "Create",
					"R" => "Read",
					"U" => "Update",
					"D" => "Delete",
                ])
                <small class="audit-form-errors">{{ $errors->first('operation') }}</small>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6 form-group">
				<label>Start Date</label>
                @date("start_date")
                <small class="audit-form-errors" >{{ $errors->first('start_date') }}</small>
            </div>
            <div class="col-6 form-group">
				<label>End Date</label>
                @date("end_date")
                <small class="audit-form-errors">{{ $errors->first('end_date') }}</small>
            </div>
        </div>

        <div class="row">
            <div class="col-12 form-group">
                <button type="submit" class="btn btn-secondary btn-block">Search</button>
            </div>
        </div>
    </form>
</div>
@endsection
@push("scripts")
    <script>
     $(document).ready(function() {
         registration.init();
     });
    </script>
@endpush
