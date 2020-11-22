
<?php $__env->startSection("body"); ?>
<div class="container  bg-white ml-auto mr-auto">
    <form id="main-form" action="<?php echo e(route("save-audit")); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="page-heading">Create an Audit</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label>Select Table Name*</label>
                <?php
                $params     = ["table"];
                $name       = $params[0];
                $attributes = defaultParameter($params, 1, []);
                $selected   = defaultParameter($params, 2, "");
                $options    = ["" => "None"];
                $tables = array_map("reset", \DB::select("SHOW TABLES"));
                foreach ($tables as $key => $value) {
                    $options[$value] = $value;
                }
                echo App\Support\Form::selectSearchable("Table", $name, $options, $attributes, $selected);
            ?>
                <small class="audit-form-errors"><?php echo e($errors->first('table')); ?></small>
                <br />
                <small class="audit-form-errors"><?php echo e($errors->first('check-fields')); ?></small>
            </div>
        </div>
        <div id="toggle-show-fields" class="row hidden">
            <p class="col-12">Select fields to audit</p>
            <div class="form-group col-12">
                <input type="checkbox" name="check-all" id="check-all">
                <label for="check-all">Select all Fields</label>
            </div>

        </div>
        <div class="row">
            <div class="col-2 form-group">
                <button type="submit" class="btn btn-secondary btn-block">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush("scripts"); ?>
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
                    url:"<?php echo e(route('get-fields')); ?>",
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
                                            output  += "<li class='col-12'>";
                                                output  += "<input class='select-field' type='checkbox' name='" + fields[counter];
                                                output  += "' id='" + fields[counter] + "'>";
                                                output  += "<label for='" + fields[counter] + "'>";
                                                output  += fields[counter] + "</label>";

                                                output  += "<ul class='row list-unstyled select-field-opt hidden'>";
                                                    output += "<li class='col-4'>"
                                                        output += "<p>Loggable</p>";
                                                            output += "<input type='radio' name='log-"+ fields[counter];
                                                            output += "' id='log-yes-"+ fields[counter] + "' value='1'>";
                                                            output += "<label for='log-yes-"+ fields[counter] +"'>";
                                                            output +=  "Yes</label>";

                                                            output += "<input type='radio' name='log-"+ fields[counter];
                                                            output += "' id='log-no-"+ fields[counter] + "' value='0'>";
                                                            output += "<label for='log-no-"+ fields[counter] +"'>";
                                                            output +=  "No</label>";
                                                    output  += "</li>";

                                                    output += "<li class='col-4'>";
                                                        output += "<p>Enabled</p>";
                                                            output += "<input type='radio' name='en-"+ fields[counter];
                                                            output += "' id='en-yes-"+ fields[counter] + "' value='1'>";
                                                            output += "<label for='en-yes-"+ fields[counter] +"'>";
                                                            output += "Yes</label>";

                                                            output += "<input type='radio' name='en-"+ fields[counter];
                                                            output += "' id='en-no-"+ fields[counter] + "' value='0'>";
                                                            output += "<label for='en-no-"+ fields[counter] +"'>";
                                                            output += "No</label>";
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


                        // Handles hidding fields options when
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

        let checkFields = ""
        $("[type='submit']").click(function(){
            if ($(':checkbox:checked').length){
               checkFields += "<input type='hidden' id='check-fields' name='check-fields' value='1'>";
               $("#main-form").prepend($(checkFields));
            }

        });
    
         
     });

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make("base.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>