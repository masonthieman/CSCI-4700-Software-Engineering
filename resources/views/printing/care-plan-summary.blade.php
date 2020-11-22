@extends("base.master")
@section("body")
    <div class="container summary-container bg-white">
        <div class="pagebrk">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-heading">CARE PLAN SUMMARY</h1>
                </div>
            </div>
            @header("Demographics")
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
            @include("form.vital-signs")
            @include("form.advanced-directives")
        </div>
        <div class="pagebrk">
            @include("form.providers")
            @include("form.adl")
            @include("form.medication-list", ["hide_pharmacy" => True])
            @include("form.allergies")
            @include("form.immunizations")
            @include("form.routine-screenings")
        </div>
        <div class="pagebrk">
            @header("Screening Recommendations")
            <div class="row">
                <div class="col-md-12 text-center">
                    <h5>Medicare Part B Preventive Services</h5>
                </div>
            </div>
            @include("form.preventive-services")
        </div>
        <div class="pagebrk">
            @include("form.referrals-to-programs")
            @include("form.risk-factors")
            @include("form.psychosocial-issues")
            @include("form.chronic-conditions")
            @header("Care Plans")
            <div id="care-plan-values"></div>
            <div class="row">
                <div class="col-12">
                    @table([
                    "name"       => "care_plans",
                    "columns"    => ["name", "icd10", "date"],
                    "data"       => $carePlan,
                    "pagination" => false
                    ])
                </div>
            </div>
            @include("form.other-notes")
            @divider
            @include("form.completed-by")
        </div>
        @foreach($form->carePlans as $careplan)
            <div class="pagebrk">
                <div class="row">
                    <div class="printing-col col-md-12 text-center">
                        <h3>Care Plan: {{$careplan->template->name}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="printing-col col-md-6">
                        <label>ICD10:</label>
                        <span class="printing-span">{{$careplan->icd10 ? $careplan->icd10 : $careplan->template->icd10}}</span>
                    </div>
                    <div class="printing-col col-md-6">
                        <label>Date:</label>
                        <span class="printing-span">{{dateValue($careplan->date)}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Symptoms</h4>
                    </div>
                </div>
                @foreach($careplan->template->template["symptoms"] as $key => $original)
                    @if($original["type"] == 0)
                        <div class="row">
                            <div class="printing-col col-md-12">
                                <input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["symptoms"][$key]["checked"]) !!}>
                                <label>{{$original["description"]}}</label>
                            </div>
                        </div>
                    @elseif($original["type"] == 1)
                        <div class="row">
                            <div class="printing-col col-md-6">
                                <input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["symptoms"][$key]["checked"]) !!}>
                                <label>{{$original["description"]}}</label>
                            </div>
                            @if($careplan->care_plan["values"]["symptoms"][$key]["value"])
                            <div class="printing-col col-md-6">
                                <span class="printing-span">{{$careplan->care_plan["values"]["symptoms"][$key]["value"]}}</span>
                            </div>
                            @endif
                        </div>
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-md-12">
                        <h4>Goals</h4>
                    </div>
                </div>
                @foreach($careplan->template->template["goals"] as $key => $original)
                    @if($original["type"] == 0)
                        <div class="row">
                            <div class="printing-col col-md-12">
                                <input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["goals"][$key]["checked"]) !!}>
                                <label>{{$original["description"]}}</label>
                            </div>
                        </div>
                    @elseif($original["type"] == 1)
                        <div class="row">
                            <div class="printing-col col-md-6">
                                <input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["goals"][$key]["checked"]) !!}>
                                <label>{{$original["description"]}}</label>
                            </div>
                            @if($careplan->care_plan["values"]["goals"][$key]["value"])
                            <div class="printing-col col-md-6">
                                <span class="printing-span">{{$careplan->care_plan["values"]["goals"][$key]["value"]}}</span>
                            </div>
                            @endif
                        </div>
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-md-12">
                        <h4>Tasks</h4>
                    </div>
                </div>
                @foreach($careplan->template->template["tasks"] as $key => $original)
                    @if($original["type"] == 0)
                        <div class="row">
                            <div class="printing-col col-md-12">
                                <input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["tasks"][$key]["checked"]) !!}>
                                <label>{{$original["description"]}}</label>
                            </div>
                        </div>
                    @elseif($original["type"] == 1)
                        <div class="row">
                            <div class="printing-col col-md-6">
                                <input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["tasks"][$key]["checked"]) !!}>
                                <label>{{$original["description"]}}</label>
                            </div>
                        </div>
                        @if($careplan->care_plan["values"]["tasks"][$key]["value"])
                            <div class="printing-col col-md-6">
                                <span class="printing-span">{{$careplan->care_plan["values"]["tasks"][$key]["value"]}}</span>
                            </div>
                        @endif
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-md-12">
                        <h4>Physicians and Specialists</h4>
                    </div>
                </div>
                @if(isset($careplan->care_plan["misc"]["physicians"]))
                    @foreach($careplan->care_plan["misc"]["physicians"] as $physician)
                        <div class="row">
                            <div class="printing-col col-md-4">
                                <span class="printing-span">{{$physician[0]}}</span>
                            </div>
                            <div class="printing-col col-md-4">
                                <span class="printing-span">{{$physician[1]}}</span>
                            </div>
                            <div class="printing-col col-md-4">
                                <span class="printing-span">{{$physician[2]}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="printing-col col-md-4">
                                <label>Name</label>
                            </div>
                            <div class="printing-col col-md-4">
                                <label>Number</label>
                            </div>
                            <div class="printing-col col-md-4">
                                <label>Specialty</label>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <h4>Pharmacies</h4>
                    </div>
                </div>
                @if(isset($careplan->care_plan["misc"]["pharmacies"]))
                    @foreach($careplan->care_plan["misc"]["pharmacies"] as $pharmacy)
                        <div class="row">
                            <div class="printing-col col-md-2">
                                <span class="printing-span">{{$loop->iteration}}</span>
                            </div>
                            <div class="printing-col col-md-7">
                                <span class="printing-span">{{$pharmacy[0]}}</span>
                            </div>
                            <div class="printing-col col-md-3">
                                <span class="printing-span">{{$pharmacy[1]}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="printing-col col-md-2">
                                <label>RX</label>
                            </div>
                            <div class="printing-col col-md-7">
                                <label>Name</label>
                            </div>
                            <div class="printing-col col-md-3">
                                <label>Number</label>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <h4>Medications</h4>
                    </div>
                </div>
                @if(isset($careplan->care_plan["misc"]["medications"]))
                    @foreach($careplan->care_plan["misc"]["medications"] as $medication)
                        <div class="row">
                            <div class="printing-col col-md-1">
                                <span class="printing-span">{{$medication[0] == 0 ? "N/A" : $medication[0]}}</span>
                            </div>
                            <div class="printing-col col-md-4">
                                <span class="printing-span">{{$medication[1]}}</span>
                            </div>
                            <div class="printing-col col-md-4">
                                <span class="printing-span">{{$medication[2]}}</span>
                            </div>
                            <div class="printing-col col-md-3">
                                <span class="printing-span">{{config("form.medical_abbreviations.$medication[3]")}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="printing-col col-md-1">
                                <label>RX</label>
                            </div>
                            <div class="printing-col col-md-4">
                                <label>Name</label>
                            </div>
                            <div class="printing-col col-md-4">
                                <label>Strength</label>
                            </div>
                            <div class="printing-col col-md-3">
                                <label>Frequency</label>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <h4>Resources</h4>
                    </div>
                </div>
                @if(isset($careplan->care_plan["values"]["resources"]))
                    @foreach($careplan->template->template["resources"] as $key => $original)
                        @if($original["type"] == 0)
                            <div class="row">
                                <div class="printing-col col-md-12">
                                    <input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["resources"][$key]["checked"]) !!}>
                                    <label>{{$original["description"]}}</label>
                                </div>
                            </div>
                        @elseif($original["type"] == 1)
                            <div class="row">
                                <div class="printing-col col-md-6">
                                    <input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["resources"][$key]["checked"]) !!}>
                                    <label>{{$original["description"]}}</label>
                                </div>
                                @if($careplan->care_plan["values"]["resources"][$key]["value"])
                                <div class="printing-col col-md-6">
                                    <span class="printing-span">{{$careplan->care_plan["values"]["resources"][$key]["value"]}}</span>
                                </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <h4>Tracking</h4>
                    </div>
                </div>
                @foreach($careplan->template->template["tracking"] as $key => $original)
                    @if($original["type"] == 0)
                        <div class="row">
                            <div class="printing-col col-md-12">
                                <input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["tracking"][$key]["checked"]) !!}>
                                <label>{{$original["description"]}}</label>
                            </div>
                        </div>
                    @elseif($original["type"] == 1)
                        <div class="row">
                            <div class="printing-col col-md-6">
                                <input type="checkbox" {!! checkboxChecked($careplan->care_plan["values"]["tracking"][$key]["checked"]) !!}>
                                <label>{{$original["description"]}}</label>
                            </div>
                            @if($careplan->care_plan["values"]["tracking"][$key]["value"])
                            <div class="printing-col col-md-6">
                                <span class="printing-span">{{$careplan->care_plan["values"]["tracking"][$key]["value"]}}</span>
                            </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
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
