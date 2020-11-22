@extends("base.master")
@section("body")
    <div class="container bg-white">
        <form action="" method="post" autocomplete="off" name="registration_form">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-heading">Patient Registration</h2>
                </div>
            </div>
            @include('form.patient-information')
            @divider
            @include('component.power-of-attorney')
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="form-check text-right custom-control custom-checkbox">
                        <input class="form-check-input" type="checkbox" value="1" id="enroll-ccm" name="enroll_iccm">
                        <label class="form-check-label" for="enroll-ccm">Enroll in CCM</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="form-check text-right">
                        <input class="form-check-input" type="checkbox" value="1" id="enroll-awv" name="enroll_awv">
                        <label class="form-check-label" for="enroll-awv">Enroll in AWV</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="form-check text-right">
                        <input class="form-check-input" type="checkbox" value="1" id="enroll-tcm" name="enroll_tcm">
                        <label class="form-check-label" for="enroll-tcm">Enroll in TCM</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="form-check text-right">
                        <input class="form-check-input" type="checkbox" value="1" id="enroll-other" name="enroll_other">
                        <label class="form-check-label" for="enroll-other">Enroll Other</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-left form-group">
                    <a class="btn btn-primary" href="{{route('home')}}">Cancel</a>
                </div>
                <div class="col-6 text-right form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
