@extends("base.master")
@section("body")
    <div class="container bg-white">
        @header("Billing")
        <div class="row">
            @foreach(
                [
                "billing_initial_awv"    => "Initial AWV (G0438)",
                "billing_subsequent_awv" => "Subsequent AWV (G0539)",
                "billing_advanced_care_plan"      => "Advanced Care Plan (99497)",
                "billing_care_plan_development"   => "Care Plan Development (G0506)"
                ]
                as $name => $label
                )

            <div class="col-12">
                <input type="checkbox" {{checkboxChecked($form->$name)}}>
                <label>
                    {{ $loop->index + 1}}. {{ $label }}
                </label>
            </div>
        @endforeach
    </div>
    @foreach($form->billingOthers as $billingOther)
        <div class="row">
            <div class="form-group printing-col col-md-5">
                <label for="">Completed By:</label>
                <span class="printing-span">{{$form->employee->esig()}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label>
                    Other
                </label>
            </div>
            <div class="col-md-4">
                <label>
                    CPT
                </label>
            </div>
        </div>
    </div>
    @endforeach
    @divider
    <div class="row">
        <div class="form-group printing-col col-md-5">
            <label>Completed By:</label>
            <span class="printing-span">{{$form->employee->esig()}}</span>
        </div>
        <div class="printing-col col-md-4">
            <label>Employee ID:</label>
            <span class="printing-span">{{$form->employee->renova_id}}</span>
        </div>
        <div class="printing-col col-md-3">
            <label>Date:</label>
            <span class="printing-span">{{dateValue($form->updated_at)}}</span>
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
