@extends("base.master")
@section("body") 
    @component("component.tabs", [
        "name" => "dashboard",
        "tabs" => ["growth_charts", "my_patients"]
        ])
            @slot("growth_charts")
                @include("dashboard.growth-charts")
            @endslot
            @slot("my_patients")
                @include("dashboard.my-patients")
            @endslot
    @endcomponent
@endsection
