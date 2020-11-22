/**
 * Invoked after the form has been submitted
 */
 
var onResult = function (form, fields, response, error) {	
	// var myJSON = JSON.stringify(response);	
	if (error) {
		if (response.data.errors.hasOwnProperty('insurance_primary_idnum')) {			
			
			if($("input[name='insurance_primary_idnum']").val()!=''){
				if (confirm("Would you like continue with duplicate Primary Policy Id?")) {
				   $("#insurance_primary_idnum_check").val("1");
				   if(Object.keys(response.data.errors).length==1){
					    response.data.errors.remove('insurance_primary_idnum');
					    $("form[name='registration_form']").submit();
				   }else{
					    $("input[name='insurance_primary_idnum']").removeClass("is-invalid");
					    $("input[name='insurance_primary_idnum']").next(".invalid-feedback").html("");
				   }
				}else{
					$("#insurance_primary_idnum_check").val("0");
				}
			}
		}
		
		if (response.data.errors.hasOwnProperty('insurance_secondary_idnum')) {			
			
			if($("input[name='insurance_secondary_idnum']").val()!=''){
				if (confirm("Would you like continue with duplicate Secondary Policy Id?")) {
				   $("#insurance_secondary_idnum_check").val("1");
				   if(Object.keys(response.data.errors).length==1){
					    response.data.errors.remove('insurance_secondary_idnum');
					    $("form[name='registration_form']").submit();
				   }else{
					    $("input[name='insurance_secondary_idnum']").removeClass("is-invalid");
					    $("input[name='insurance_secondary_idnum']").next(".invalid-feedback").html("");
				   }
				}else{
					$("#insurance_secondary_idnum_check").val("0");
				}
			}
		}
	}
	else{		
		//$("body").append(myJSON);

		// if (response.data.errors.hasOwnProperty('insurance_primary_idnum')) {
		// 	if($("#insurance_primary_idnum_check").val()==1){
		// 		response.data.errors.remove('insurance_primary_idnum');
		// 		response.status = 200;
		// 	}
		// }	
		// if (response.data.errors.hasOwnProperty('insurance_secondary_idnum')) {
		// 	if($("#insurance_secondary_idnum_check").val()==1){
		// 		response.data.errors.remove('insurance_secondary_idnum');
		// 		response.status = 200;
		// 	}
		// }
		// if(response.status == 200 ) {
			window.location.href = response.data.redirect;
		// }
	}
};

var init = function () {
	form.ajaxForm("registration_form", onResult, undefined, function () {
		notify.danger("Invalid information provided");
		return true;
	});
	$("[name='practice_id']").on("changed.bs.select", function () {
		util.updatePhysicianList(parseInt($(this).val()), $("#physician"));
	});	
	$("#no_email").click( function(e) {
		// if (e.target.name == 'no_email'){
		// 	if(this.prop('checked', false)) {
		// 		this.prop( "checked", true );
		// 	} else {
		// 		this.prop('checked', false)
		// 	}
		// 	return true;
		// }
		/*
		e.preventDefault();
		alert("i am called");
		if($("#no_email").prop('checked', false)) {
			$("#no_email").prop( "checked", true );
		} else {
			$("#no_email").prop('checked', false)
		}*/
		/*
		 if (e.target.name == 'no_email'){ // When recordlistitem is a checkbox(es)
			return true;
		 }
		*/
		
		// other stuff here
	});
};

window.registration = {
	init: init,
    onResult: onResult
};