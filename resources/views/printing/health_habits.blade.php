@extends("base.master")
@section("body")
    <div class="container questionnaire-container bg-white">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-heading">
					@if($form->type == "awv")
                        AWV QUESTIONNAIRE
                    @else
                        Initital CCM QUESTIONNAIRE
                    @endif
                </h1>
            </div>
        </div>
        @include("printing.questionnaire.health-habits")
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
