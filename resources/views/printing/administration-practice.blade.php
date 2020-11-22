@extends("base.master")
@section("body")
    <div class="container summary-container bg-white">
        <div class="pagebrk">
            @header("Practice Information")
            <div class="row">
                <div class="printing-col col-4 form-group">
                    <label>Practice Number</label>
                    <span class="printing-span">{{$practice->number}}</span>
                </div>
                <div class="printing-col col-8 form-group">
                    <label>Practice Name:</label>
                    <span class="printing-span">{{$practice->name}}</span>
                </div>
            </div>
            <div class="row">
                <div class="printing-col col-12">
                    <label>
                        <input type="checkbox" {{ checkBoxChecked($practice->is_active) }}>
                        Is Active
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>
            @header("Physicians")
            @foreach ($practice->physicians as $physician)
                <div class="row">
                    <div class="printing-col col-12 form-group">
                        <span class="printing-span">{{ $physician->name }}</span>
                    </div>
                </div>
            @endforeach
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
