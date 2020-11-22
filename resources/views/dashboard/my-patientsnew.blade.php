@extends("base.master")
@section("body")

@include("component.sidebar")
    <div id="main">
    <div class="container bg-white " >	
        <div class="row">
            <div class="col-4">
			<button class="openbtn" onclick="openNav()">☰ Action Items</button>
			</div>
			<div class="col-8">
                @include("dashboard.tcm-dashboard-filter")
            </div>
        </div>
        @divider
        
       
	
 
	</div>
</div>
@endsection
