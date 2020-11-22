@extends("base.master")
@section("body")
    <div class="container summary-container bg-white">
        <div class="pagebrk">
            @header("Care Plan Template Information")
            <div class="row">
                <div class="printing-col col-6 form-group">
                    <label>Name:</label>
                    <span class="printing-span">{{$template->name}}</span>
                </div>
                <div class="printing-col col-6 form-group">
                    <label>ICD-10 Code:</label>
                    <span class="printing-span">{{$template->icd10}}</span>
                </div>
            </div>
            @if (isset($template["template"]["symptoms"]))
                @header("Symptoms")
                <div class="row">
                    <div class="col-12" style="padding-top: 20px;">
                        @table([
                            "name"          => "symptoms",
                            "columns"       => ["type", "description"],
                            "labels"        => ["Type", "Description"],
                            "data"          => $template["template"]["goals"],
                            "pagination"    => False,
                            "small"         => True,
                            "bordered"      => True
                        ])
                    </div>
                </div>
            @endif
            @if (isset($template["template"]["goals"]))
                @header("Goals")
                <div class="row">
                    <div class="col-12" style="padding-top: 20px;">
                        @table([
                            "name"          => "goals",
                            "columns"       => ["type", "description"],
                            "data"          => $template["template"]["goals"],
                            "pagination"    => False,
                            "small"         => True,
                            "bordered"      => True
                        ])
                    </div>
                </div>
            @endif
            @if (isset($template["template"]["tasks"]))
                @header("tasks")
                <div class="row">
                    <div class="col-12" style="padding-top: 20px;">
                        @table([
                            "name"          => "tasks",
                            "columns"       => ["type", "description"],
                            "data"          => $template["template"]["goals"],
                            "pagination"    => False,
                            "small"         => True,
                            "bordered"      => True
                        ])
                    </div>
                </div>
            @endif
            @if (isset($template["template"]["resources"]))
                @header("resources")
                <div class="row">
                    <div class="col-12" style="padding-top: 20px;">
                        @table([
                            "name"          => "resources",
                            "columns"       => ["type", "description"],
                            "data"          => $template["template"]["goals"],
                            "pagination"    => False,
                            "small"         => True,
                            "bordered"      => True
                        ])
                    </div>
                </div>
            @endif
            @if (isset($template["template"]["tracking"]))
                @header("tracking")
                <div class="row">
                    <div class="col-12" style="padding-top: 20px;">
                        @table([
                            "name"          => "tracking",
                            "columns"       => ["type", "description"],
                            "data"          => $template["template"]["goals"],
                            "pagination"    => False,
                            "small"         => True,
                            "bordered"      => True
                        ])
                    </div>
                </div>
            @endif
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
