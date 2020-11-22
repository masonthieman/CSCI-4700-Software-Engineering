/**
 * Questionnaire-Form Javascript
 */

const URL_POPULATE = "/ajax/questionnaire_populate";
const URL_SAVE     = "/ajax/questionnaire_save";
const URL_SUBMIT   = "/ajax/questionnaire_submit";
const URL_PRINT    = "/questionnaire/printing/";
const URL_PRINT_SECTION = "/questionnaire/printing_section/";

const URL_BYPASS_SAVE = "/ajax/questionnaire_byPassValidationSave";

/**
 * Populate the form of the given patient
 *
 * @param {Integer} patientId
 */
var populateForm = function(patientId) {
    if (!patientId)
        return;
    $.get(
        URL_POPULATE,
        {patient_id: patientId},
        function(data) {
            console.log(data);
            form.dynamicFormPopulate("questionnaire_form", data);
            util.updatePhysicianList(
                parseInt($("[name='practice_id']").val()),
                $("#physician"),
                data.static.physician_id
            );
            updateBmi();
            form.evaluateRules("questionnaire_form");
            $("#dob").trigger("blur");
            $('.dateFormat').each(function (index, value){
                var date = $(this).val();
                // var newDate = new Date(Date.parse(date)).format("MM/yyyy");
                var newDate='';
                if(date != ''){
                    var parts = date.split('-');
                    var newDate = parts[1] + '/' + parts[0];
                    // console.log($(this).attr('name'));
                    // console.log(date+"<-new    old->"+newDate);
                }
                $(this).val(newDate);
            });
            // $('.dateFormat').datepicker({ dateFormat: 'dd-mm-yy' }).val();
        }
    ).fail(function(result) {
        console.error("Population Error:", result);
    });
};

/**
 * Invoked when the form is submitted
 *
 * @return {Boolean}
 */
var onSubmit = function () {
    $(".tab-error").removeClass("tab-error");
    return true;
};

/**
 * Invoked when the user requests to print
 *
 * @param {Event}   event
 * @param {Boolean} confirmed
 */
var onPrint = function (event, confirmed = false, formId = null) { 
	var checkFormIdVal = $("#form-id").val();
	if(checkFormIdVal != null && checkFormIdVal != ""){
		formId = $("#form-id").val();
		const msg = "Make sure all of your work is saved before continuing";
		if(confirmed || confirm(msg)) {
			window.open(URL_PRINT + formId);
		}
	} else {
        $("form[name='questionnaire_form']").attr("action", URL_SAVE);
		$("#questionnaire-save").trigger('click'); //alert("Kindly, save the patient data.");
	}
};

/**
 * Invoked when the user requests to print a section
 *
 * @param {Event}   event
 * @param {Boolean} confirmed
 */
var onPrintSection = function (event, confirmed = false, formId = null, tabId = null) {
    var checkFormIdVal = $("#form-id").val();
	if(checkFormIdVal != null && checkFormIdVal != ""){
		formId = formId || $("#form-id").val();
		tabId = $("#form-section-id").val();
		const msg = "Make sure all of your work is saved before continuing";
		if(confirmed || confirm(msg)) {
			window.open(URL_PRINT_SECTION + tabId + "/" + formId );
		}
	} else {
		alert("Kindly, save the patient data.");
	}
};

/**
 * Invoked when errors in the form are detected
 */
var onErrors = function (form, fields, response) {
    if (response.data.errors) {
        for (var field in response.data.errors) {
            try {
                let id = fields.fields[field].parents("[role='tabpanel']").attr("id");
                $(`#${id}-tab`).addClass("tab-error");
            } catch (e) {
                console.error("Field Error:", field, fields.fields);
            }
        }
    }
    $("form[name='questionnaire_form']").attr("action", URL_SAVE);
    return true;
};

/**
 * Invoked after the form has been submitted
 */
var onResult = function (form, fields, response, error) {
		//if no allergies listed nkda must be checked...
		if (($('div[data-dynamic-template="allergies"]:empty').length) && ($('#allergies_nkda').is(':checked') == false )) {
			$('#tabs-questionnaire-personal_health_history-tab').addClass("tab-error");
			$("#nkda_error").text("This field is required, when no allergies are listed.");
			$("#nkda_error").css("display","block");
			$(".allergies_nkda").addClass("form-control is-invalid");
			response.status=422;
		}
			
    if (error)
        console.log(error);
    if (response.status == 200) {
        // $("form[name='questionnaire_form']").attr("action", URL_SAVE);
        notify.success("Questionnaire Saved Successfully");
        $("#form-id").val(response.data.form);
        setTimeout(function () {
            if (confirm("Would you like to print now?")) {
                onPrint(null, true, response.data.form);
            }
        }, 1);
    } 
   /*  else if (response.status == 422){
        // notify.danger("Save Failed: Invalid Information Provided");
        // var pd_last_seen = $("[name='pd_last_seen']").val()
        // alert(pd_last_seen);
        // if(pd_last_seen==''){
        //   var pd_last_seen='00-00-0000';
        // }
        // console.log($("#form-id").val(response.data.form));
      
        // if(response.data.errors.alcohol_amount_week[0] == 'Required when answer to the question "Do you drink alcohol" is yes'){
            
        //     $("form[name='questionnaire_form']").attr("action", URL_SAVE);
        //     alert($("form[name='alcohol_amount_week']").val());
        // }
        
         setTimeout(function () {
            if (confirm("Save Anyhow ?")){
                $("form[name='questionnaire_form']").attr("action", URL_BYPASS_SAVE);
                // $("form[name='questionnaire_form']").submit();
                // return true;
            }
        }, 1);
        
    }  */

    else if (response.status == 422){
            if(confirm("Save Anyhow ?")) {
                 $.ajax({
                   type: "POST",
                   url: "/ajax/questionnaire_byPassValidationSave",
                   data: form.serialize(), // serializes the form's elements.
                   success: function(data)
                   {
					  // alert(JSON.stringify(data));
					  // alert(data.form);
					   $("#form-id").val(data.form);
                     setTimeout(function () {
                        if (confirm("Would you like to print now?")) {
                            onPrint(null, true, data);
                        }
                    }, 1);
                   }
                 });
            }
    }

    else {
        // $("form[name='questionnaire_form']").attr("action", URL_SAVE);
        notify.danger("Save Failed: Unknown Error");
    }
};

var updateBmi = function() {
    var result = 0;
    try {
        let weight = $("[name='vital_weight']").val();
        let height = $("[name='vital_height']").val();
        result = weight / Math.pow(height, 2) * 703;
    } catch (e) {
        console.warn(e);
    }
    $("#bmi").val(result.toFixed(1));
};

/**
 * Special case for linking system
 */
var linkingSurgeryWithin90Days = function () {
    const RISK_FACTOR = "Pending Surgery w/in 90 days";
    var entry = form.dynamicFormFindEntry("questionnaire_form", "risk_factors", {name: "risk_factor", value: RISK_FACTOR});
    if (form.dynamicForm("upcoming_surgeries").children().length > 0) {
        if (!entry)
            form.dynamicFormAdd("risk_factors", {risk_factor: RISK_FACTOR});
    } else {
        if (entry)
            form.dynamicFormRemove(entry);
    }
};

var medicationAllergiesNoted = function () {
    const RISK_FACTOR = "Medication Allergies Noted";
    var entry = form.dynamicFormFindEntry("questionnaire_form", "risk_factors", {name: "risk_factor", value: RISK_FACTOR});
    if (form.dynamicForm("allergies").children().length > 0) {
        if (!entry)
            form.dynamicFormAdd("risk_factors", {risk_factor: RISK_FACTOR});
    } else {
        if (entry)
            form.dynamicFormRemove(entry);
    }
};

/**
 * Get Tab Id For Section Print
 */
var getTabId = function () {
    var tab_id = $(this).attr('data-change-tab');
    $('#form-section-id').val(tab_id);
};

function validateYear(year) {
    var dteNow = new Date();
    if(year<"1902" || year> dteNow.getFullYear()){
        return false;
    }
    return true;
}

function validateMonth(month) {
    if(month<"00" || month> "12"){
        return false;
    }
    return true;
}

function validateDay(Day) {
    if(Day<"00" || Day> "31"){
        return false;
    }
    return true;
}

function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}

/**
 * Initialize the form
 */
var init = function () {
    $("[name='patient_id']").change(function() {
		var id = $(this).val(); //current patient id
		$('form[name="questionnaire_form"]')[0].reset(); //clear previous record
		$("#form-id").val('');
		$("[name='patient_id']").val(id); // form cleared, so sets id again :)
        populateForm(id); //populate form according to new patient id
        updateBmi();
    });
    $("[name='practice_id']").on("changed.bs.select", function () {
        util.updatePhysicianList(parseInt($(this).val()), $("#physician"));
    });

    $("#questionnaire-submit").click(function () {
        $("form[name='questionnaire_form']").attr("action", URL_SUBMIT);
        $("form[name='questionnaire_form']").submit();
    });
    $("#print-button").click(onPrint);
    $("#print-section-button").click(onPrintSection);
    $("[name='vital_weight'], [name='vital_height']").change(updateBmi);
    form.dynamicForm("upcoming_surgeries").on("dynamic-area-added",   linkingSurgeryWithin90Days);
    form.dynamicForm("upcoming_surgeries").on("dynamic-area-removed", linkingSurgeryWithin90Days);
    form.dynamicForm("upcoming_surgeries").on("dynamic-area-cleared", linkingSurgeryWithin90Days);
	
	form.dynamicForm("allergies").on("dynamic-area-added",   medicationAllergiesNoted);
    form.dynamicForm("allergies").on("dynamic-area-removed", medicationAllergiesNoted);
    form.dynamicForm("allergies").on("dynamic-area-cleared", medicationAllergiesNoted);

    $(".nav-page-btn").click(getTabId);
    $(".nkda_error").css("display","none");
    $(".dateFormat").datepicker({ changeMonth: true,
            changeYear: true, dateFormat: 'mm/yy', 			
			onSelect: function(dateText, inst) {				
				$(this).val(dateText);
				$(this).trigger("focus").trigger("blur");
				
			}
	});
			
	$('body').on('focus',".dateFormat", function(){
		$(this).datepicker({ changeMonth: true,
            changeYear: true, dateFormat: 'mm/yy', 			
			onSelect: function(dateText, inst) {				
				$(this).val(dateText);
				$(this).trigger("focus").trigger("blur");
				
			}
		});
	});
	
	
    $(document.body).on('change', '.dateFormat' ,function(){

        var newDt="", dateYear ="", dateMonth="", dateDay="", err="";
        var getDate = $(this).val();
        // var dteNow = new Date();
        var getDtLength = getDate.length;
        
        if(getDtLength>0){
            var splitDate = getDate.split('/');
            var splitDateLength = splitDate.length;
            
            switch(splitDateLength) {
                // case 3:
                //     //Full Date
                //     dateYear = parseInt(splitDate[2]);
                //     dateMonth = parseInt(splitDate[0]);
                //     dateDay = parseInt(splitDate[1]);
                    
                //     if(!validateYear(dateYear)){
                //         err="Invalid Year";
                //     }
                //     if(!validateMonth(dateMonth)){
                //         err="Invalid Month";
                //     }
                //     if(!validateDay(dateDay)){
                //         err="Invalid day";
                //     }
                //     //newDt = pad(dateMonth,2)+"/"+pad(dateDay,2)+"/"+dateYear;
                //     newDt = pad(dateMonth,2)+"/"+dateYear;
                //     break;
                case 2:
                    //Month-Year
                    dateYear = parseInt(splitDate[1]);
                    dateMonth = parseInt(splitDate[0]);
                    
                    if(!validateYear(dateYear)){
                        // err="Invalid Year";
                        err="Invalid Date";
                    }
                    if(!validateMonth(dateMonth)){
                        // err="Invalid Month";
                        err="Invalid Date";
                    }
                    // newDt = pad(dateMonth,2)+"/00/"+dateYear;
                    //newDt = pad(dateMonth,2)+"/"+dateYear;
					newDt = pad(dateMonth,2)+"/"+dateYear;
                    break;
                // case 1:
                //     //Year
                //     dateYear = parseInt(splitDate[0]);
                    
                //     if(!validateYear(dateYear)){
                //         err="Invalid Year";
                //     }
                //     // newDt = "00/00/"+dateYear;
                //     newDt = "01/"+dateYear;                    
                //     break;
                default:
                    err="Invalid Date";
            }
            if(err != ""){
                $(this).val("");
                alert(err);
                newDt="";
            }
            $(this).val(newDt);
            // alert( getDate +"   "+ getDate.length +" newDt==>"+ newDt + "dateYear==>" +dateYear + "dateMonth==>" +dateMonth + "dateDay==>" +dateDay);

        }
    });

    // $('.datepicker').datepicker({  

    //     format: 'mm-dd-yyyy'
 
    //   });  

    // $("[name='immunization_tetanus_date'],[name='immunization_hepatitis_date'],[name='immunization_influenza_date'],[name='immunization_pneumonia_date'],[name='immunization_varicella_date'],[name='routine_screening_mammography_date'],[name='routine_screening_std_date'],[name='routine_screening_prostate_date'],[name='routine_screening_bone_density_date'],[name='routine_screening_ultrasound_date'],[name='routine_screening_cholesterol_date'],[name='routine_screening_triglyceride_date'],[name='routine_screening_hdl_date'],[name='routine_screening_colonoscopy_date'],[name='routine_screening_pap_date']").change(function(){        
    //     toggleCheckbox($(this).attr("name"));
    // });

    // $("[name='immunization_tetanus_date'],[name='immunization_hepatitis_date'],[name='immunization_influenza_date'],[name='immunization_pneumonia_date'],[name='immunization_varicella_date']").change(function(){        
    //     toggleUnknow($(this).attr("name"));
    // });

};

/**
 * Export the module
 */
window.questionnaire = {
    init: init,
    onErrors: onErrors,
    onResult: onResult,
    onSubmit: onSubmit
};
