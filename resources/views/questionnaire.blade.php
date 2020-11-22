@extends("base.master")
@section("body")
    <div class="container questionnaire-container bg-white">
        <div class="row ">
            <div class="col-12 text-center">
                <h1 class="page-heading">
                    @if($type == "awv")
                        AWV QUESTIONNAIRE
                    @else
                        Initital CCM QUESTIONNAIRE
                    @endif
                </h1>
            </div>
        </div>
        <form action="{{ route("ajax.questionnaire.save") }}" method="post" name="questionnaire_form">
            @csrf
            <input type="hidden" name="questionnaire_type" value="{{ $type }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group capitalize">
                        <label for="patient_id">Patient</label>
                        @selectpatient("patient_id")
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="practice_id">Practice</label>
                        @selectactivepractice("practice_id")
                    </div>
                </div>
            </div>
            @component("component.tabs", [
            "name" => "questionnaire",
            "tabs" => ["patient_info", "personal_health_history", "health_habits", "screen_recommendations", "notes_billing"]
            ])
                @slot("patient_info")
                    @include("questionnaire.patient-information")
                @endslot
                @slot("personal_health_history")
                    @include("questionnaire.personal-health-history")
                @endslot
                @slot("health_habits")
                    @include("questionnaire.health-habits")
                @endslot
                @slot("screen_recommendations")
                    @include("questionnaire.screening-recommendations")
                @endslot
                @slot("notes_billing")
                    @include("questionnaire.notes-billing")
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group text-left">
                    <button type="button" name="print_section_button" id="print-section-button" class="btn btn-primary">Print Section</button>
					<button type="button" name="print_button" id="print-button" class="btn btn-primary">Print All</button>
                </div>
                <div class="col-6 form-group text-right">
                    <button class="btn btn-primary" id="questionnaire-save">Save</button>
                    <button type="button" id="questionnaire-submit" class="btn btn-secondary">Submit</button>
                </div>
            </div>
            <input name="questionnaire_form_id" type="hidden" id="form-id" value="" />
            <input name="questionnaire_form_section_id" type="hidden" id="form-section-id" value="patient_info" />
        </form>
    </div>
@endsection

@push("scripts")
    <script>
     $(document).ready(function() {
         questionnaire.init();
         form.ajaxForm(
             "questionnaire_form",
             questionnaire.onResult,
             questionnaire.onSubmit,
             questionnaire.onErrors
        );
        form.addAutofillRules(
            "questionnaire_form",
            {!! json_encode(config("questionnaire")["autofill"]) !!}
        );
        form.evaluateRules("questionnaire_form");
     });
    </script>
@endpush
