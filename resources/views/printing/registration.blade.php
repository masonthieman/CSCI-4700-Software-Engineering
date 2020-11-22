@extends("base.master")
@section("body")
    <div class="container bg-white">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-heading">Patient Registration</h2>
            </div>
        </div>
        <div class="row">
            <div class="printing-col col-md-6">
                <label>Practice:</label>
                <span class="printing-span">{{$form->practice->name}}</span>
            </div>
            <div class="printing-col col-md-6">
                <label>Physician Name:</label>
                <span class="printing-span">{{$form->physician->name}}</span>
            </div>
        </div>
        @include('form.patient-information')
        @include("component.power-of-attorney")
        <div class="row">
            <div class="col-md-12 ">
                <div class="form-check text-right custom-control custom-checkbox">
                    <label>
                        <input type="checkbox" {{ $form->enroll_iccm ? "checked" : ""}}>
                        Enroll in CCM
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="form-check text-right">
                    <label>
                        <input type="checkbox" {{ $form->enroll_awv ? "checked" : ""}}>
                        Enroll in AWV
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="form-check text-right">
                    <label>
                        <input type="checkbox" {{ $form->enroll_tcm ? "checked" : ""}}>
                        Enroll in TCM
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="form-check text-right">
                    <label>
                        <input type="checkbox" {{ $form->enroll_other ? "checked" : ""}}>
                        Enroll Other
                    </label>
                </div>
            </div>
        </div>
    </div>
@endsection
