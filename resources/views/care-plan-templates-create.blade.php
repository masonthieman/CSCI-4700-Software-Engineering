@extends("base.master")
@section("body")
    <div class="container bg-white">
        <form action="{{ $submitRoute }}" method="post" name="care_plan_template_form">
            @isset($template)
                @method("PUT")
            @endisset
            @csrf
            @isset($template)
                <input type="hidden" name="id" value="{{ $template->id }}">
            @endisset
            <div class="row">
                <div class="col-12">
                    @isset($template)
                        <h2 class="page-heading">Update Care Plan Template</h2>
                    @else
                        <h2 class="page-heading">New Care Plan Template</h2>
                    @endisset
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Condition Name</label>
                    @text("name")
                </div>
                <div class="col-md-6 form-group">
                    <label>ICD-10</label>
                    @text("icd10")
                </div>
            </div>
            @divider
            <div class="row">
                <div class="col-12">
                    <h5>Symptoms - (Check all that apply)</h5>
                </div>
            </div>
            @dynamicarea("symptoms", "check_specify", "Symptom")
            @divider
            <div class="row">
                <div class="col-12">
                    <h5>Goals - (Check all that apply)</h5>
                </div>
            </div>
            @dynamicarea("goals", "check_specify", "Goal")
            @divider
            <div class="row">
                <div class="col-12">
                    <h5>Tasks - (Check all that apply)</h5>
                </div>
            </div>
            @dynamicarea("tasks", "check_specify", "Task")
            @divider
            <div class="row">
                <div class="col-12">
                    <h5>Resources - (Check all that apply)</h5>
                </div>
            </div>
            @dynamicarea("resources", "check_specify", "Resource")
            @divider
            <div class="row">
                <div class="col-12">
                    <h5>Tracking - (Check all that apply)</h5>
                </div>
            </div>
            @dynamicarea("tracking", "check_specify", "Tracking")
            <div class="row">
                <div class="col-12 text-right form-group">
                    <a class="btn btn-primary" href="{{ route("care_plan.templates") }}">Cancel</a>
                    @isset($template)
                        <button type="button" class="btn btn-danger" id="delete-template">Delete Template</button>
                        <button type="submit" class="btn btn-secondary">Update Template</button>
                    @else
                        <button type="submit" class="btn btn-secondary">Create Template</button>
                    @endisset
                </div>
            </div>
        </form>
    </div>
@endsection
@push("dynamic_templates")
    <div class="row" data-dynamic-template-id="check_specify">
        <div class="col-12 form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <select name="type" class="custom-select">
                        <option value="0">Check Only</option>
                        <option value="1">Descriptive</option>
                    </select>
                </div>
                @text("description", ["data-feedback" => "description_feedback", "placeholder" => "Option description...", "onkeydown" => "onKeyPress(this, event);"])
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger" data-dynamic-action="remove">Remove</button>
                </div>
            </div>
            <div class="invalid-feedback visible" data-feedback-area="description_feedback"></div>
        </div>
    </div>
@endpush
@push("scripts")
    <script>
        var onKeyPress = function(elem, event) {
            if (event.keyCode == 13) {
                onEnterPress(elem);
                event.preventDefault();
                return false;
            }
        };

        var onEnterPress = function(elem) {
            var parent = $(elem).parents("[data-dynamic-area]").get(0);
            var area = $(parent).attr("data-dynamic-area");
            var result = form.dynamicFormAdd(area);
            result.find("input").focus();
        };
    </script>
    @isset($template)
        <script>
            $(document).ready(function() {
                form.ajaxForm("care_plan_template_form");
                form.dynamicFormPopulate("care_plan_template_form", {!! json_encode($form) !!});
                $("#delete-template").click(function() {
                    if (confirm("Are you sure you want to delete the template {{ $template->name }}?")) {
                        $("[name='_method']").val("DELETE");
                        $("[name='care_plan_template_form']").attr("action", "{{ $deleteRoute }}").submit();
                    }
                });
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                form.ajaxForm("care_plan_template_form");
            });
        </script>
    @endisset
@endpush
