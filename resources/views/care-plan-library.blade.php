@extends("base.master")
@section("body")
    <div class="container bg-white">
        <div class="row">
            <div class="col-12">
                <h2 class="page-heading">Care Plan Library</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center form-group">
                <h3>Setup</h3>
                <a href="{{ route("care_plan.templates") }}" class="btn btn-primary btn-block">Care Plans</a>
                <a href="#" class="btn btn-primary btn-block">Care Plans by Provider</a>
            </div>
        </div>
    </div>
@endsection
