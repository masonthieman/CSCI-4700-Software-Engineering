/**
 * TCM-Form Javascript
 */

const URL_POPULATE = "/ajax/tcm_populate";
const URL_SAVE = "/ajax/tcm_save";
const URL_SUBMIT = "/ajax/tcm_submit";
const URL_PRINT = "/tcm/printing/";

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
            form.dynamicFormPopulate("tcm_form", data);
            util.updatePhysicianList(
                parseInt($("[name='practice_id']").val()),
                $("#physician"),
                data.static.physician_id
            );

			var countAttempts = util.countAttempt(data.static.id);
            //contactCount();

            currentDate('first-contact-attempt-date');           
            currentDate('second-contact-attempt-date');         

            form.evaluateRules("tcm_form");
            $("#dob").trigger("blur");
			
        }
    ).fail(function(result) {
        console.error("Population Error:", result);
    });
};



/* Calculate current date -- added by Deborah Gladys */
var currentDate = function(id){
    var today = 0;
    try{
      var now = new Date();
      var day = ("0" + now.getDate()).slice(-2);
      var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = `${now.getFullYear()}-${month}-${day}`;
    }
    catch (e){
      console.warn(e)
    }
    //var today = (month) + "/" + (day) + "/" + now.getFullYear();
	if($("#"+id).val() == "")
    {
      $("#"+id).val(today);
    }
	
}; 
/* Calculate current date */

/* Calculate initial contact required date --added by Deborah Gladys*/
function initialContact(date,n) {
    var initialDate = 0;
    try{
          var now = new Date(date);
          var dayOfTheWeek = now.getDay();
          var calendarDays = n;
          var deliveryDay = dayOfTheWeek + n;
          if (deliveryDay >= 6) 
          {
            
            if(dayOfTheWeek == 6)
            {
               n -= 6 - dayOfTheWeek;
               calendarDays += 1; 
            }
            else 
            {
                n -= 6 - dayOfTheWeek;
               calendarDays += 2; 
            }
          }
          now.setTime(now.getTime() + calendarDays * 24 * 60 * 60 * 1000); 

    }
    catch (e){
        console.warn(e);
    }  
    //return now;  
   
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var initialDate = `${now.getFullYear()}-${month}-${day}`;
        $("#initial_contact_required").val(initialDate);

}
/* Calculate initial contact required date */

/* Calculate second contact required date -- added by Deborah Gladys */
function secondContact(date,n) {
    var secondDate = 0;
    try{
          var now = new Date(date);
          var dayOfTheWeek = now.getDay();
          var calendarDays = n;
          var deliveryDay = dayOfTheWeek + n;
          if (deliveryDay >= 6) 
          {
            
            if(dayOfTheWeek == 6)
            {
               n -= 6 - dayOfTheWeek;
               calendarDays += 1; 
            }
            else 
            {
                n -= 6 - dayOfTheWeek;
               calendarDays += 2; 
            }
          }
          now.setTime(now.getTime() + calendarDays * 24 * 60 * 60 * 1000); 

    }
    catch (e){
        console.warn(e);
    }  
    //return now;  
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var secondDate = `${now.getFullYear()}-${month}-${day}`;
    $("#second_contact_required").val(secondDate);
}
/* Calculate second contact required date */


/* Function to check the difference between intial contact required on date and 1st attempt date in business days -- added by Deborah Gladys */
function differenceBusinessDays(startDate, endDate){
    try{              
      var iWeeks, iDateDiff, iAdjust = 0;
      dDate1 = new Date(startDate);
      dDate2 = new Date(endDate);
     
      if (dDate2 < dDate1) return 0;                 // error code if dates transposed
     
      var iWeekday1 = dDate1.getDay();                // day of week
      var iWeekday2 = dDate2.getDay();
     
      iWeekday1 = (iWeekday1 == 0) ? 7 : iWeekday1;   // change Sunday from 0 to 7
      iWeekday2 = (iWeekday2 == 0) ? 7 : iWeekday2;
     
      if ((iWeekday1 > 5) && (iWeekday2 > 5)) iAdjust = 1;  // adjustment if both days on weekend
     
      iWeekday1 = (iWeekday1 > 5) ? 5 : iWeekday1;    // only count weekdays
      iWeekday2 = (iWeekday2 > 5) ? 5 : iWeekday2;
     
      // calculate differnece in weeks (1000mS * 60sec * 60min * 24hrs * 7 days = 604800000)
      iWeeks = Math.floor((dDate2.getTime() - dDate1.getTime()) / 604800000)
     
      if (iWeekday1 <= iWeekday2) {
        iDateDiff = (iWeeks * 5) + (iWeekday2 - iWeekday1)
      } else {
        iDateDiff = ((iWeeks + 1) * 5) - (iWeekday1 - iWeekday2)
      }
     
      iDateDiff -= iAdjust ;  
      var days = iDateDiff + 1;
    }
    catch (e){
        console.warn(e);
    }  
    if(days >= 3)
    {
      alert("STOP! Does not qualify for TCM. The process/program is stopped.");
    }      
};
/* Function to check the difference between intial contact required on date and 1st attempt date in business days -- added by Deborah Gladys */


/* Calculate follow up date -- added by Deborah Gladys */
var followUpDate = function(){
  fdate = '';
    try{ 
	
      var ddate = $("#discharge_date").val(); 
	  fdate = addCalendarDays(ddate,30);
	  
    }
    catch (e){
      console.warn(e)
    }
    if($("#face_to_face_timely_completed").prop("checked") == true)
      {
        $("#billing-follow-up-date").val(fdate);
      }
      else
      {
        $("#billing-follow-up-date").val('');
      }
};

/* Calculate follow up date */

/**
 * Invoked when the form is submitted
 *
 * @return {Boolean}
 */
var onSubmit = function() {
  $(".tab-error").removeClass("tab-error");
  return true;
};

/**
 * Invoked when the user requests to print
 *
 * @param {Event}   event
 * @param {Boolean} confirmed
 */
var onPrint = function(event, confirmed = false, formId = null) {
  var checkFormIdVal = $("#form-id").val();
	if(checkFormIdVal != null && checkFormIdVal != ""){
    formId = $("#form-id").val();
    const msg =
      "Please make sure to save your work before continuing. If your work is not saved, click 'cancel' and save/submit first; otherwise, click 'continue/ok'";
    if (confirmed || confirm(msg)) {
    window.open(URL_PRINT + formId);
    }
  }
  else {
    $("form[name='tcm_form']").attr("action", URL_SAVE);
    $("#tcm-save").trigger('click'); //alert("Kindly, save the patient data.");
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
    $("form[name='tcm_form']").attr("action", URL_SAVE);
    return true;
};

/**
 * Invoked after the form has been submitted
 */
var onResult = function (form, fields, response, error) {
    if (error)
        console.log(error);
    if (response.status == 200) {
        notify.success("TCM Saved Successfully");
        $("#form-id").val(response.data.form);
        setTimeout(function () {
            if (confirm("Would you like to print now?")) {
                onPrint(null, true, response.data.form);
            }
        }, 1);
    } else if (response.status == 422){
        notify.danger("Save Failed: Invalid Information Provided");
    } else {
        notify.danger("Save Failed: Unknown Error");
    }
};

//admission dropdown
$('#admission-facility-type').on('change', function() {
  var specific_value = $(this).find(":selected").val()
  if(specific_value=='other'){
     alert("if Admission Facility Type is other, then TCM may not apply!!!");
  }
});

//office prior
 $("#prior_visit-no").on('change', function() {
    if ($(this).is(':checked')) {
        switchStatus = $(this).is(':checked');
        //alert(switchStatus);// To verify
        alert('STOP!  Does not qualify for TCM')
    }
    else {
       switchStatus = $(this).is(':checked');
       alert('switchStatus');// To verify
    }


  });

 // patient cntct

 $("#first_contact_attempt").click(function(){
  if($(this).is(':checked')){ 
     currentDate('first-contact-attempt-date'); 
  }else{
      $("#first-contact-attempt-date").val(" ");
  }
 });

  $("#second_contact_attempt").click(function(){
  if($(this).is(':checked')){ 
     currentDate('second-contact-attempt-date'); 
  }else{
      $("#second-contact-attempt-date").val(" ");
  }
 });

 
//last Visit date
$("#lastVisit").blur(function(){
    var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds 
    var visitdate = $(this).val();
        selected = visitdate.split('-'),
        year = selected[0],
        month = selected[1],
        day = selected[2];
      var d = new Date();
      var month = d.getMonth()+1;
      var day = d.getDate();
      var output = d.getFullYear() + '/' +
          ((''+month).length<2 ? '0' : '') + month + '/' +
          ((''+day).length<2 ? '0' : '') + day;
         currentDate = output.split('/'),
      
          year1 = currentDate[0],
          month1 = currentDate[1],
          day1 = currentDate[2];
      var firstDate = new Date(year,month,day); 
      var secondDate = new Date(year1,month1,day1); 
      var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
    if(visitdate!=''){
      if(diffDays >= 1095){
          alert('STOP! Does not qualify for TCM');
        $("#outcome-greater-than-3-years-since-last-ov").prop('checked', true);
      }else if(diffDays < 1095){
        $("#outcome-greater-than-3-years-since-last-ov").prop('checked',false);
      }
      }else{
        $("#outcome-greater-than-3-years-since-last-ov").prop('checked',false);
      }
});

//face-to-face Scheduled or Reschedule check condition
$("#face_to_face_scheduled").click(function(){
    if($("#face_to_face_scheduled").prop('checked', true)){
        $("#face_to_face_visit_rescheduled").prop('checked', false);
      }
});

$("#face_to_face_visit_rescheduled").click(function(){
    if($("#face_to_face_visit_rescheduled").prop('checked', true)){
      $("#face_to_face_scheduled").prop('checked', false);
    }
});


 $("#med_recon_completed_prior_to_face_to_face").click(function(){
	if($(this).prop("checked") == true){
		$("#med_recon_not_completed_prior_to_face_to_face").prop('checked', false);
		$("#outcome-medication-reconciliation-not-timely-or-completed").prop('checked',true);
	}else if($(this).prop("checked") == false){
		$("#outcome-medication-reconciliation-not-timely-or-completed").prop('checked',false);
	}
});
 $("#med_recon_not_completed_prior_to_face_to_face").click(function(){
	if($(this).prop("checked") == true){
		$("#med_recon_completed_prior_to_face_to_face").prop('checked', false);
		$("#outcome-medication-reconciliation-not-timely-or-completed").prop('checked',true);
	}else if($(this).prop("checked") == false){
		$("#outcome-medication-reconciliation-not-timely-or-completed").prop('checked',false);
	}
});



// ("face_to_face_timely_completed")
//  face_to_face_notCompleted
$("#face_to_face_non_timely_rescheduled").click(function(){
  if($("#face_to_face_non_timely_rescheduled").prop('checked', true)){
   $("#face_to_face_timely_completed").prop('checked', false);
   $("#outcome-face-to-face-not-completed").prop('checked', false);
   $("#face_to_face_timely_completed_date").val('');
   $("#face_to_face_notCompleted").prop('checked', false);
   $("#ftf_timely_time").val('');
   $("#face-to-face-notCompleted-reason").val('');
  }
});

$("#face_to_face_timely_completed").click(function(){
  if($("#face_to_face_timely_completed").prop('checked', true)){
   $("#face_to_face_non_timely_rescheduled").prop('checked', false);
   $("#outcome-face-to-face-not-completed").prop('checked', false);
   $("#outcome-face-to-face-not-completed-timely").prop('checked', false);
   $("#face_to_face_non_timely_rescheduled_date").val('');
   $("#face_to_face_notCompleted").prop('checked', false);
   $("#ftf_non_timely_time").val('');
   $("#face_to_face_non_timely_rescheduled_notes").val('');
   $("#face-to-face-notCompleted-reason").val('');

  }
});

$("#face_to_face_notCompleted").click(function(){
  if($("#face_to_face_notCompleted").prop('checked', true)){
   $("#face_to_face_timely_completed").prop('checked', false);
   $("#outcome-face-to-face-not-completed-timely").prop('checked', false);
   $("#face_to_face_non_timely_rescheduled").prop('checked', false);
   $("#face_to_face_non_timely_rescheduled_date").val('');
   $("#ftf_non_timely_time").val('');
   $("#face_to_face_non_timely_rescheduled_notes").val('');
   $("#face_to_face_timely_completed_date").val('');
   $("#fftf_timely_time").val('');
  }

});

//end

//for auto caculate bussiness date
function pad(s, width, character) {
    return new Array(width - s.toString().length + 1).join(character) + s;
}


linkingOutcomeDischargeToNonQualifiedLocation = function(){
  //debugger;
  let dischargeTo = $('#discharged-to').val();
  let admissionForm = $('#admitted-form').val();
  nonAcceptableVal = ['hospice','snf','rehab','other'];
  if(admissionForm == "other"){
    $("#outcome-discharge-to-non-qualified-location").prop("checked", true);
    $("#outcome-admission-facility-type").prop("checked", true);
	}else{
		$("#outcome-discharge-to-non-qualified-location").prop("checked", false);
		$("#outcome-admission-facility-type").prop("checked", false);
	}
	if((jQuery.inArray(dischargeTo, nonAcceptableVal) !== -1) || (admissionForm == "other")){
		$("#outcome-discharge-to-non-qualified-location").prop("checked", true);
	}else{
		$("#outcome-discharge-to-non-qualified-location").prop("checked", false);
		
	}
}

 function addBusinessDays(date, n){
	
	now = moment(date, 'YYYY-MM-DD').businessAdd(n)._d;	
	
	
    return moment(now).format('YYYY-MM-DD');
}

function addCalendarDays(date, n){
	n=n+1;
	now = moment(date, 'YYYY-MM-DD').add(n, 'days'); 
	var day = now.format('DD');
	var month = now.format('MM');
	var year = now.format('YYYY');
	newdate = year + '-' + month + '-' + day;
    return newdate;
}

function navigateToTab(){
  var url      = window.location.href;   
  tabid = getUrlParameter('tab');
  $("#"+tabid).trigger('click');
   patientid = getUrlParameter('id');
  $("#patient-id").val(patientid);
  $("#patient-id").attr('value', patientid);
  $('.selectpicker').selectpicker('refresh');
  populateForm(patientid);

}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

/**
 * Initialize the form
 */
var init = function () {
	navigateToTab();
  //debugger;
  $("[name='patient_id']").change(function() {
    var id = $(this).val(); //current patient id
		$('form[name="tcm_form"]')[0].reset(); //clear previous record
		$("#form-id").val('');
		$("[name='patient_id']").val(id); // form cleared, so sets id again :)
    populateForm($(this).val());
    currentDate(); 
    
	var date1 = $("#first-contact-attempt-date").val();
	var date2 = $("#second-contact-attempt-date").val();
	if(date1==''){
		util.updateTodaysDate("first-contact-attempt-date",'set');
		
	}
	if(date1==''){
		util.updateTodaysDate("second-contact-attempt-date",'set');
		
	}
  });

  $("[name='practice_id']").on("changed.bs.select", function() {
    util.updatePhysicianList(parseInt($(this).val()), $("#physician"));

   
  });

  $("[name='discharge_date']").change(function(){
       followUpDate();
       
       Discharge_followUpDate =addBusinessDays($(this).val(),7);
       $("#followUpDate").val(Discharge_followUpDate);

       initialContactDate = addBusinessDays($(this).val(),2);
	   $("#initial_contact_required").val(initialContactDate);
       
       secondContactDate = addBusinessDays($("#initial_contact_required").val(),1);
	   $("#second_contact_required").val(secondContactDate);

	   medication_dueDate  =addBusinessDays($(this).val(),5);
	   $("#med_recon_date").val(medication_dueDate);

	   // face_to_face_dueDate = addCalendarDays($(this).val(),7);
	   // $("#dueDate").val(face_to_face_dueDate);
  });

   $("[name='initial_contact_required'],[name='first_contact_attempt_date']").change(function(){
        var date1 = $("#initial_contact_required").val();
        var date2 = $("#first-contact-attempt-date").val();
        differenceBusinessDays(date1, date2);
    });

   $("[name='second_contact_required'],[name='second_contact_attempt_date']").change(function(){
        var date1 = $("#second_contact_required").val();
        var date2 = $("#second-contact-attempt-date").val();
        differenceBusinessDays(date1, date2);
    }); 

  $("[name='face_to_face_timely_completed']").on("change", function(){
      followUpDate();
  });


$('#medComp').click(function(){
  if($(this).is(':checked')){
    $("#highComp").prop('checked',false);

    var discharge_date = $("#discharge_date").val();
       if(discharge_date==''){
        $("#medComp").prop('checked',false);
          alert("please Choose Discharge Date!!!");
          $("#dueDate").val('');
    }else{
        var date = new Date(discharge_date);
        newDate = addCalendarDays(date, 7);
      alert("Face to Face to be done within 7 days from date of discharge");
        $("#dueDate").val(newDate);
    }
  }else if($('input:checkbox').prop('checked', false)){
    $("#dueDate").val("");
  }
});

$('#highComp').click(function(){
  if($(this).is(':checked')){
    $("#medComp").prop('checked',false);

     var discharge_date = $("#discharge_date").val();

       if (discharge_date==''){
        $("#highComp").prop('checked',false);
          alert("please Choose Discharge Date!!!");

    }else{
           var date = new Date(discharge_date);
           newDate = addCalendarDays(date, 7);
      alert("Face to Face to be done within 7 days from date of discharge");
       $("#dueDate").val(newDate);
    }
  }else if($('input:checkbox').prop('checked', false)){
    $("#dueDate").val("");
  }
});
 	


//medcomp add 14 days
  // $('#medComp').click(function(){    
  //   if($(this).is(':checked')){
  //     $("#highComp").prop('checked',false);
  //     $("#face_to_face_dueDate").val('');

  //     var discharge_date = $("#discharge_date").val();
  //       if (discharge_date!=''){
  //          var date = new Date(discharge_date);
		//    newDate = addCalendarDays(date, 7);
		   
		//    $("#dueDate").val(newDate);
		//    if("#dueDate"){
  //             $("[name='med_recon_date']").val(newDate);
		// 	}
           
  //       }else{
  //       	$("#medComp").prop('checked',false);
  //       	$("#highComp").prop('checked',false);
  //         alert("Choose Discharge Date!!!");
  //       }
  //   }
  //   else{ 
  //      $("#dueDate").val('');
  //      $("[name='med_recon_date']").val('');
  //   }
  // });
//highComp add 7days
// $("#highComp").click(function() {
//   if($(this).is(':checked')){

//     $("#medComp").prop('checked',false);
//     $("#dueDate").val('');

//       var discharge_date = $("#discharge_date").val();
//         if (discharge_date!=''){
//            var date = new Date(discharge_date);
// 		   newDate = addCalendarDays(date, 7);
		   
// 		   $("#face_to_face_dueDate").val(newDate);
// 		   if("#face_to_face_dueDate"){
//                $("[name='med_recon_date']").val(newDate);
//            }
			
//         }else{
//         	$("#medComp").prop('checked',false);
//         	$("#highComp").prop('checked',false);
//           alert("Choose Discharge Date!!!");
//         }
//   }
//   else{ 
//        $("#face_to_face_dueDate").val('');
//        $("[name='med_recon_date']").val('');
//   }
// });

  $("#discharged-to").on("change", linkingOutcomeDischargeToNonQualifiedLocation);
  $("#admitted-form").on("change", linkingOutcomeDischargeToNonQualifiedLocation);
	
  $("#tcm-submit").click(function() {
		$("form[name='tcm_form']").attr("action", URL_SUBMIT);
		$("form[name='tcm_form']").submit();
	});
	$("#print-button").click(onPrint);


  // $("#tcm-submit").click(function() {
  //   $("form[name='tcm_form']").attr("action", URL_SUBMIT);
  //   $("form[name='tcm_form']").submit();
  // });
  // $("#print-button").click(onPrint);


  $("#requested").blur(function() {
    var dischargeInstructionsRequested = $("#requested").val();
    $("#dischargeRequest").val(dischargeInstructionsRequested);
  });

};

/**
 * Export the module
 */
window.tcm = {
  // key    =  value
  init: init,
  onErrors: onErrors,
  onResult: onResult,
  onSubmit: onSubmit
};
