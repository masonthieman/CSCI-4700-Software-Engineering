@extends("base.master")
@section("body")
    <div class="container questionnaire-container bg-white">
        <div class="row ">
            <div class="col-12 text-center">
                <h1 class="page-heading">
                    TCM QUESTIONNAIRE
                </h1>
            </div>
        </div>
        <form action="{{ route("ajax.tcm.save") }}" method="post" name="tcm_form">
            @csrf
            <input type="hidden" name="tcm_type" value="{{ $type }}">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="patient_id">Patient</label>
                        @selectpatient("patient_id",["id" => "patient-id"])
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="practice_id">Practice</label>
                        @selectpractice("practice_id")
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>EMR#</label>
                        <!-- <input type="text" class="form-control" id="emr" readonly> -->
                        @text("emr", ["id" => "emr", "readonly"])
                    </div>
                </div>
            </div>
            
            
            @component("component.tabs", [
            "name" => "tcm_questionnaire", 
            "tabs" => ["demographics", "office_history", "admission", "discharge", "patient_contact",
                       "med_reconciliation", "home_services", "face_to_face", "outcomes", "other_outcomes", "billing"]
            ])
                @slot("demographics")
                    @include("tcm_questionnaire.demographics")
                @endslot
                @slot("office_history")
                    @include("tcm_questionnaire.office-history")
                @endslot
                @slot("admission")
                    @include("tcm_questionnaire.admission")
                @endslot
                @slot("discharge")
                    @include("tcm_questionnaire.discharge")
                @endslot
                @slot("patient_contact")
                    @include("tcm_questionnaire.patient-contact")
                @endslot
                @slot("med_reconciliation")
                    @include("tcm_questionnaire.med-reconciliation")
                @endslot
                @slot("home_services")
                    @include("tcm_questionnaire.home-services")
                @endslot
                @slot("face_to_face")
                    @include("tcm_questionnaire.face-to-face")
                @endslot
                @slot("outcomes")
                    @include("tcm_questionnaire.outcomes")
                @endslot
                @slot("other_outcomes")
                    @include("tcm_questionnaire.other-outcomes")
                @endslot
                @slot("billing")
                    @include("tcm_questionnaire.billing")
                @endslot
                @endcomponent
            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group text-left">
                    <button type="button" name="print_button" id="print-button" class="btn btn-primary">Print</button>
                </div>
                <div class="col-6 form-group text-right">
                    <button class="btn btn-primary" id="tcm-save">Save</button>
                    <button type="button" id="tcm-submit" class="btn btn-secondary">Submit</button>
                </div>
            </div>

            <input name="tcm_form_id" type="hidden" id="form-id" value="" />
        </form>
    </div>
@endsection
@push("scripts")
    <script>
     $(document).ready(function() {
         tcm.init();
         form.ajaxForm(
             "tcm_form",
             tcm.onResult,
             tcm.onSubmit,
             tcm.onErrors
        );
        form.addAutofillRules(
            "tcm_form",
            {!! json_encode(config("tcm")["autofill"]) !!}
        );
        form.evaluateRules("tcm_form");
     });
    </script>
@endpush