@extends("base.master")
@section("body")
    <div class="container tcm-container bg-white">
        <div class="row ">
            <div class="col-12 text-center">
                <h1 class="page-heading">
                    TCM QUESTIONNAIRE
                </h1>
            </div>
        </div>
		{{-- demographics tab--}}
		@include("tcm_form.demographics")
		@include("tcm_form.advanced_directives")
		@include("tcm_form.best_time_to_contact")
		
		{{--office-history tab--}}
		@include("tcm_form.office_history")
		
		{{--admission tab--}}
		@include("tcm_form.admission")
		
		{{--discharge tab--}}
		@include("tcm_form.discharge")
		
		{{--patient-contact--}}
		@include("tcm_form.patient-contact")
		
		{{-- medication-reconciliation tab--}}
		@include("tcm_form.medication-reconciliation")
        @include("tcm_form.medication-pharmacy")
        @include("tcm_form.medication-allergies")
        @include("tcm_form.discharge-medication")
        @include("tcm_form.medication-compliance-issue")
        @include("tcm_form.medication-changes")
		
		{{--home-services--}}
		@include("tcm_form.home-services")
		
		{{--face-to-face--}}
		@include("tcm_form.face-to-face")
		
		{{--outcomes tab--}}
		@include("tcm_form.non-billable-outcomes")
		<!-- @include("tcm_form.outcome-readmission") -->
		
		{{--other-outcomes tab--}}
		@include("tcm_form.other-outcomes")
		
		{{--billing tab--}}
		@include("tcm_form.billing")
		
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
