@extends("base.master")
@section("body")
<form action="{{ route("form_test.submit") }}" method="post" name="test">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-6 form-group">
                @text("things[person][][][test]")
            </div>
            <div class="col-md-6 form-group">
                @text("things[person][][][test]")
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                @email("email")
            </div>
            <div class="col-md-6 form-group">
                @password("password")
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                @number("number")
            </div>
            <div class="col-md-6 form-group">
                @date("date")
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                @select("Thing", "thing", [
                    "option_1" => "Option 1",
                    "option_2" => "Option 2",
                    "option_3" => "Option 3"
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                @selectother("Other", "or_specify", [
                    "Choice 1",
                    "Choice 2",
                    "Choice 3"
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @selectsearch("Thing", "searchable_select", ["Item 1", "Item 2", "Item 3"])
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" id="savebutton">Save</button>
                <button id="submitbutton">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection
@push("scripts")
    <script>
        $(document).ready(function() {
            form.ajaxForm("test");
        });
        $("#savebutton").click(function() {
            console.log("Saving");
            $("form[name='test']").attr("action", "{{ route("form_test.save") }}");
            $("form[name='test']").submit();
        });
    </script>
@endpush
