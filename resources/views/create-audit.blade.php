@extends("base.master")
@section("body")
<div class="container  bg-white ml-auto mr-auto">
    <div class="row">
        <div class="col-11">
            <h2 class="page-heading">Create Audit</h2>
        </div>
        <div class="col-1">
            <button class="btn">
                <a href="{{ route("audit") }}" class="col-12"><i class="fa fa-search"></i></a>
            </button>
        </div>
    </div>
    <form id="main-form" action="{{ route("save-audit") }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-5 form-group">
                <label>Select Table Name*</label>
                @selecttable("table")

                @if ($errors->first('table'))
                    <small class="audit-form-errors col-8">{{ $errors->first('table') }}</small>
                    <br />
                @endif
                @if ($errors->first('column_name'))
                    <small class="audit-form-errors col-8">{{ $errors->first('column_name') }}</small>
                @endif

                @if ($errors->first('check-fields'))
                    <small class="audit-form-errors col-8">{{ $errors->first('check-fields') }}</small>
                @endif

            </div>
        </div>
        <div id="toggle-show-fields" class="row hidden">
            <p id="select-fields-to-audit" class="col-12">Select field(s) to audit. Must at least select one field</p>
            <div class="form-group col-12 custom-control custom-checkbox">
                <input type="checkbox" name="check-all" id="check-all" class="custom-control-input">
                <label class="custom-control-label" for="check-all">All</label>
            </div>

        </div>
        <div class="row">
            <div class="col-2 form-group">
                <button type="submit" class="btn btn-secondary btn-block">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
@push("scripts")
    <script>

     $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         registration.init();
         $("[name ='table']").change(function(){
            if($(this).val().length > 0 ){ // Only display fields if valid table name is selected
                $("#toggle-show-fields").removeClass("hidden");
                $("#check-all").prop("checked", false);
                $.ajax({
                    type:"POST",
                    url:"{{ route('get-fields') }}",
                    data: {tableName: $("[name ='table']").val()},
                    dataType: "json",
                    success:function(response){
                        // Create HTML Fields content here
                        $("#fields").remove(); // Refresh this element
                        response.data.shift(); // Delete the ID
                        const fields = response.data;
                        const SZ = fields.length;
                        let cols = Math.ceil( SZ / 8);
                        let counter = 0;
                        let colClass = ( cols < 2 ) ? "col-8" : "col-4"; // Vary col size if its just one col
                        let output = "<div id='fields' class='row'>";
                            for(let i = 0; i < cols; i++){
                                output += "<ul class='row "+ colClass +" list-unstyled'>";
                                    for(let j = 0; j < 8;){
                                        if( counter < SZ){
                                            output  += "<li class='col-12 custom-control custom-checkbox'>";
                                                output  += "<input class='select-field custom-control-input' type='checkbox' name='" + fields[counter];
                                                output  += "' id='" + fields[counter] + "'>";
                                                output  += "<label class='custom-control-label' for='" + fields[counter] + "'>";
                                                output  += fields[counter] + "</label>";

                                                output  += "<ul class='row list-unstyled select-field-opt hidden'>";
                                                    output += "<li class='col-5'>"
                                                        output += "<p>Loggable</p>";
                                                            output += "<div class= 'custom-control custom-radio'>";
                                                                output += "<input class='custom-control-input' type='radio' name='log-"+ fields[counter];
                                                                output += "' id='log-yes-"+ fields[counter] + "' value='1'>";
                                                                output += "<label class='custom-control-label' for='log-yes-"+ fields[counter] +"'>";
                                                                output +=  "Yes</label>";
                                                            output += "</div>";

                                                            output += "<div class= 'custom-control custom-radio'>";
                                                                output += "<input class='custom-control-input' type='radio' name='log-"+ fields[counter];
                                                                output += "' id='log-no-"+ fields[counter] + "' value='0'>";
                                                                output += "<label class='custom-control-label' for='log-no-"+ fields[counter] +"'>";
                                                                output +=  "No</label>";
                                                            output += "</div>" ;

                                                    output  += "</li>";

                                                    output += "<li class='col-5'>";
                                                        output += "<p>Enabled</p>";
                                                            output += "<div class= 'custom-control custom-radio'>";
                                                                output += "<input class='custom-control-input' type='radio' name='en-"+ fields[counter];
                                                                output += "' id='en-yes-"+ fields[counter] + "' value='1'>";
                                                                output += "<label class='custom-control-label' for='en-yes-"+ fields[counter] +"'>";
                                                                output += "Yes</label>";
                                                            output += "</div>" ;

                                                            output += "<div class= 'custom-control custom-radio'>";
                                                                output += "<input class='custom-control-input' type='radio' name='en-"+ fields[counter];
                                                                output += "' id='en-no-"+ fields[counter] + "' value='0'>";
                                                                output += "<label class='custom-control-label'  for='en-no-"+ fields[counter] +"'>";
                                                                output += "No</label>";
                                                            output += "</div>" ;
                                                    output  += "</li>";

                                                output  += "</ul>";

                                            output  += "</li>";
                                            counter += 1;
                                            j++;
                                        } else{
                                            break;
                                        }
                                    }
                                output += "</ul>";
                            }
                        output += "</div>";
                        // Attach created HTML to DOM
                        $("#toggle-show-fields").append($(output));
                        // Disable change event bubbling up to the parent container
                        $("#fields [type='checkbox']").change(function(e){
                            e.stopPropagation();
                        });

                        // Toggle select all fields
                        $("#check-all").change(function(){
                        if($(this).is(":checked")) { // Check box is checked
                                $("#fields [type='checkbox']")
                                .each(function(){
                                    $(this).prop("checked", true);
                                    $(".select-field-opt").removeClass("hidden");
                                    $(this).parent().find("[id*='yes']")
                                    .each(function(){
                                        $(this).prop("checked", true);
                                    });
                                });
                            } else {
                                $("#fields [type='checkbox']")
                                .each(function(){
                                    $(this).prop("checked", false);
                                    $(".select-field-opt").addClass("hidden");
                                    $(this).parent().find("[id*='yes']")
                                    .each(function(){
                                        $(this).prop("checked", false);
                                    });
                                });
                            }
                        });


                        // Handles hiding fields options when
                        // field name is unchecked
                        $(".select-field").each(function(){
                            $(this).change(function(){
                                if($(this).is(":checked")){
                                    $(this).parent().find(".select-field-opt")
                                    .removeClass("hidden");
                                    $(this).parent().find(".select-field-opt")
                                    .find("[id*='yes']")
                                    .each(function(){
                                        $(this).prop("checked", true);
                                    });
                                } else{
                                    $(this).parent().find(".select-field-opt")
                                    .addClass("hidden");
                                    $(this).parent().find(".select-field-opt")
                                    .find("[id*='yes']")
                                    .each(function(){
                                        $(this).prop("checked", false);
                                    });
                                }
                            });
                        });
                    }
                }); // End $.ajax: AJAX call
            } else{ // Otherwise
                $("#toggle-show-fields").addClass("hidden");
            }  // End if($(this).val().length > 0 )
        }); // End $("[name ='table']").change: Change table table name event

         // Validate selected fields
        let checkFields = ""
        $("[type='submit']").click(function(){
            if ($(':checkbox:checked').length){
               checkFields += "<input type='hidden' id='check-fields' name='check-fields' value='1'>";
               $("#main-form").prepend($(checkFields));
            }

        });
     });

    </script>
@endpush