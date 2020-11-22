@extends("base.master")
@section("body")
    <div class="container summary-container bg-white">
        <div class="pagebrk">
            @header("Employee Information")
            <div class="row">
                <div class="printing-col col-6 form-group">
                    <label>Renova ID:</label>
                    <span class="printing-span">{{$employee->renova_id}}</span>
                </div>
                <div class="printing-col col-6 form-group">
                    <label>Title:</label>
                    <span class="printing-span">{{$employee->title->title}}</span>
                </div>
            </div>
            <div class="row">
				<div class="printing-col col-4 form-group">
					<label>Last Name:</label>
					<span class="printing-span">{{$employee->lname}}</span>
				</div>
				<div class="printing-col col-4 form-group">
					<label>First Name:</label>
					<span class="printing-span">{{$employee->fname}}</span>
				</div>
				<div class="printing-col col-4 form-group">
					<label>Middle Name:</label>
					<span class="printing-span">{{$employee->mname ?? ""}}</span>
				</div>
            </div>
            <div class="row">
                <div class="printing-col col-6 form-group">
                    <label>Email Address</label>
                    <span class="printing-span">{{$employee->auth->email}}</span>
                </div>
                <div class="printing-col col-6 form-group">
                    <label>Assigned Manager</label>
                    <span class="printing-span">{{$employee->auth->manager ? $employee->auth->manager->employee->esig() : "N/A"}}</span>
                </div>
            </div>
            <div class="row">
                <div class="printing-col col-3 form-group">
                    <label>
                        <input type="checkbox" {{ checkBoxChecked(!$employee->auth->is_manager && !$employee->auth->is_admin) }}>
                        General Employee
                    </label>
                </div>
                <div class="printing-col col-3 form-group">
                    <label>
                        <input type="checkbox" {{ checkBoxChecked($employee->auth->is_manager) }}>
                        Manager
                    </label>
                </div>
                <div class="printing-col col-3">
                    <label>
                        <input type="checkbox" {{ checkBoxChecked($employee->auth->is_admin) }}>
                        Administrator
                    </label>
                </div>
                <div class="printing-col col-3">
                    <label>
                        <input type="checkbox" {{ checkBoxChecked($employee->auth->is_active) }}>
                        Is Active
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>
            @header("Practices")
            <div class="row">
                <div class="col-12" style="padding-top: 20px;">
                    @table([
                        "name"          => "practices",
                        "columns"       => ["number", "name", "is_active"],
                        "data"          => $employee->practices,
                        "booleanFields" => ["is_active"],
                        "pagination"    => False,
                        "small"         => True,
                        "bordered"      => True
                    ])
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    Total practices: {{ count($employee->practices) }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push("scripts")
    <script>
     $(document).ready(function() {
         $("[type='checkbox']").click(function() {return false;});
         $("[type='radio']").click(function() {return false;});
     });
    </script>
@endpush
