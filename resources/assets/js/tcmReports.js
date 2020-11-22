// Urls to fetch the data from
const FETCH_TCM_REPORTS_URL = "/ajax/tcmReports/fetch";
var tcmFilters = {
    "admission-facility-type": {
        "modal": "#modal-tcm-admit-discharge-admission-facility-type-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "discharged-to": {
        "modal": "#modal-tcm-admit-discharge-discharge-to-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "discharged-to-detail": {
        "modal": "#modal-tcm-admit-discharge-discharge-to-detail-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "readmission": {
        "modal": "#modal-readmission-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "readmission-detail": {
        "modal": "#modal-readmission-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "initial-contact-missed-untimely": {
        "modal": "#modal-tcm-patient-contact-initial-contact-missed-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "face-to-face-not-completed": {
        "modal": "#modal-patient-contact-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "outcomes-other": {
        "modal": "#modal-patient-contact-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "by-hospital-group-billable": {
        "modal": "#modal-tcm-billable-by-hospital-group-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "by-hospital-group-billable-detail": {
        "modal": "#modal-tcm-billable-by-hospital-group-detail-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "med-reconciliation-outcome": {
        "modal": "#modal-med-reconciliation-outcome-type-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
   "med-reconciliation-outcome-detail": {
        "modal": "#modal-med-reconciliation-outcome-detail-type-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "med-rec-compliance-issues": {
        "modal": "#modal-tcm-med-rec-compliance-issues-type-filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "non-billable-outcome-by-group-hostpital": {
        "modal": "#modal-tcm_non-billable-outcome-by-group-hostpital_filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "non-billable-outcome-by-group-hostpital-detailed": {
        "modal": "#modal-tcm_non-billable-outcome-by-group-hostpital-detailed_filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "home-services": {
        "modal": "#modal-tcm_non-billable-outcome-by-group-hostpital-detailed_filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    },
    "home-services-detailed": {
        "modal": "#modal-tcm_non-billable-outcome-by-group-hostpital-detailed_filter",
        "filters": {
            "employee": null,
            "practice": null,
        }
    }
};

var tableData = {
    "patients":    {}
};

// Make note of the initial fetch time to prevent multiple fetches
var fetchTime = 0;

// The URL to go to when a row is clicked
var actionUrl = "";

/**
 * Lock the controls so they don't change during the request
 */
var lock = function() {

    table("reports").setData({}, updateRecordCount).setLoading(true);
    $("select, button").prop("disabled", true);
};

/**
 * Unlock the controls
 */
var unlock = function() {

    table("reports").setLoading(false);
    $("select, button").prop("disabled", false);
};

/**
 * Fetch the reports of the given category
 *
 * @param {String} category
 */
var fetch = function (category) {
    // Update the newest request time and clear the table
    fetchTime = (new Date()).getTime();
    $("#records").html(`Total Records: 0`);

    // Disable the other form fields while everything is fetched
    lock();

    // Save the request time and send the request
    var fetchInstanceTime = fetchTime;

    dataString = fetchFilters();	
	axios({
			method: "POST",
			url: FETCH_TCM_REPORTS_URL,
			data: dataString,
			dataType: "json",
		}).then(function (response) {	
           // var data = JSON.stringify(response);
         	
            if (fetchInstanceTime == fetchTime) {
                // actionUrl = data.data.action;
                unlock();
                tableData = response.data.data;
    
                if(category == "admission-facility-type"){
                    table("tcm_reports").setData(tableData, updateRecordCount);
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "admission-facility-type" , "title": "Admission Facility Type" },
                        { "data": "adDate", "title": "Admission Date" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "patientCount", "title": "Patient Count"  }
                    ];
                    scrollX = false;
                }
                if(category == "discharged-to"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "discharged_to" , "title": "Discharge To" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "patientCount", "title": "Patient Count"  }
                    ];
                    scrollX = false;
                }
                if(category == "discharged-to-detail"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "fname", "title": "First Name" },
                        { "data": "lname" , "title": "Last Name" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "dob" , "title": "Date Of Birth" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "discharged_to", "title": "Discharge To"  }
                    ];
                    scrollX = false;
                }
                if(category == "readmission"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "outcome_readmission_for_same_or_similar_condition_occurred", "title": "Readmission for Same or Similar Condition"  },
                        { "data": "patientCount", "title": "Patient Count"  }
                    ];
                    scrollX = false;
                }
                if(category == "readmission-detail"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "fname", "title": "First Name" },
                        { "data": "lname" , "title": "Last Name" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "dob" , "title": "Date Of Birth" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "outcome_readmission_for_same_or_similar_condition_occurred", "title": "Readmission for Same or Similar Condition"  }
                    ];
                    scrollX = false;
                }
                 if(category == "initial-contact-missed-untimely"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "fname", "title": "First Name" },
                        { "data": "lname" , "title": "Last Name" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "dob" , "title": "Date Of Birth" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "initial_contact_required", "title": "Initial Contact Required"  },
                        { "data": "first_contact_attempt_date", "title": "First Attempt Date"  },
                        { "data": "status", "title": "Status" },
                    ];
                    scrollX = false;
                }
                if(category == "face-to-face-not-completed"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "fname", "title": "First Name" },
                        { "data": "lname" , "title": "Last Name" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "dob" , "title": "Date Of Birth" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "medComp", "title": "Moderate Complexity"  },
                        { "data": "highComp", "title": "High Complexity" },
                        { "data": "face_to_face_notCompleted_reason", "title": "Reason" },
                    ];
                    scrollX = false;
                }
                if(category == "outcomes-other"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "fname", "title": "First Name" },
                        { "data": "lname" , "title": "Last Name" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "dob" , "title": "Date Of Birth" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "readmission_for_new_or_diff_condition_occured", "title": "Readmission for new or different condition occured"  },
                        { "data": "ED_visit_same_or_similar", "title": "ED visit since discharge for same or similar condition" },
                        { "data": "ED_visit_new_or_different", "title": "ED visit since discharge for new or different condition" },
                        { "data": "other_outcome_other", "title": "Other" },
                    ];
                    scrollX = false;
                }
                if(category == "by-hospital-group-billable"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "billing_ending", "title": "Billing"  },
                        { "data": "patientCount", "title": "Patient Count"  }
                    ];
                    scrollX = false;
                }
                if(category == "by-hospital-group-billable-detail"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "fname", "title": "First Name" },
                        { "data": "lname" , "title": "Last Name" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "dob" , "title": "Date Of Birth" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "billing_ending", "title": "Billing"  },
                    ];
                    scrollX = false;
                }
                if(category == "med-reconciliation-outcome"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "med_recon_not_completed_prior_to_face_to_face", "title": "Medication Reconciliation Not completed prior to F2F"  },
                        { "data": "med_recon_completed_prior_to_face_to_face", "title": "Medication Reconciliation Completed prior to F2F"  },
                        /*{ "data": "patientCount", "title": "Patient Count"  },*/
                    ];
                    scrollX = false;
                }
                if(category == "med-reconciliation-outcome-detail"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "fname", "title": "First Name" },
                        { "data": "lname" , "title": "Last Name" },
                        { "data": "dob" , "title": "Date Of Birth" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                      /*  { "data": "status" , "title": "Status" },*/
                        { "data": "med_recon_not_completed_prior_to_face_to_face", "title": "Medication Reconciliation Not completed prior to F2F"  },
                        { "data": "med_recon_completed_prior_to_face_to_face", "title": "Medication Reconciliation Completed prior to F2F"  },
                    ];
                    scrollX = false;
                }
                if(category == "med-rec-compliance-issues"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "fname", "title": "First Name" },
                        { "data": "lname" , "title": "Last Name" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "dob" , "title": "Date Of Birth" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "med_recon_completed_prior_to_face_to_face" , "title": "Medication Reconciliation Completed prior to F2F" },
                        { "data": "med_recon_compliance_issue_reason", "title": "Reason"  },
                    ];
                    scrollX = false;
                }
                if(category == "non-billable-outcome-by-group-hostpital"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "outcome_face_to_face_not_completed" , "title": "Face To Face Not Completed" },
                        { "data": "outcome_face_to_face_not_completed_timely" , "title": "Face To Face Non Timely" },
                        { "data": "outcome_initial_contact_not_timely", "title": "Initial Contact Not Timely"  },
                        { "data": "outcome_no_prior_office_visit", "title": "No prior Office Visit"  },
                        { "data": "outcome_greater_than_3_years_since_last_ov", "title": "Greater thane 3 years Last office visit", "width": "100px"  },
                        { "data": "outcome_patient_expired_since_discharge", "title": "Patient Expired Since Discharge"  },
                        { "data": "outcome_discharge_to_non_qualified_location", "title": "Discharge to non-qualified Location"  },
                        { "data": "outcome_admission_facility_type", "title": "Admission Facility Type"  },
                        { "data": "outcome_readmission_for_same_or_similar_condition_occurred", "title": "Readmission for same condition"  },
                        { "data": "outcome_no_discharge_instructions_available", "title": "No Discharge Instructions"  },
                        { "data": "outcome_medication_reconciliation_not_timely_or_completed", "title": "Medication Reconciliation Initial Contact Not Timely"  },
                       /* { "data": "patientCount" , "title": "Patient Count" },*/
                    ];
                    scrollX = true;
                }
                if(category == "non-billable-outcome-by-group-hostpital-detailed"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "fname", "title": "First Name" },
                        { "data": "lname" , "title": "Last Name" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "dob" , "title": "Date Of Birth" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "outcome_face_to_face_not_completed" , "title": "Face To Face Not Completed" },
                        { "data": "outcome_face_to_face_not_completed_timely" , "title": "Face To Face Non Timely" },
                        { "data": "outcome_initial_contact_not_timely", "title": "Initial Contact Not Timely"  },
                        { "data": "outcome_no_prior_office_visit", "title": "No prior Office Visit"  },
                        { "data": "outcome_greater_than_3_years_since_last_ov", "title": "Greater thane 3 years Last office visit"  },
                        { "data": "outcome_patient_expired_since_discharge", "title": "Patient Expired Since Discharge"  },
                        { "data": "outcome_discharge_to_non_qualified_location", "title": "Discharge to non-qualified Location"  },
                        { "data": "outcome_admission_facility_type", "title": "Admission Facility Type"  },
                        { "data": "outcome_readmission_for_same_or_similar_condition_occurred", "title": "Readmission for same condition"  },
                        { "data": "outcome_no_discharge_instructions_available", "title": "No Discharge Instructions"  },
                        { "data": "outcome_medication_reconciliation_not_timely_or_completed", "title": "Medication Reconciliation Initial Contact Not Timely"  },
                    ];
                    scrollX = true;
                }
                if(category == "home-services"){
                      columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "start_home_health", "title": "Home Health"  },
                        { "data": "start_dme", "title": "DME"  },
                        { "data": "start_ptot", "title": "PTOT"  },
                        { "data": "start_oxygen", "title": "Oxygen"  },
                        { "data": "start_lab_radiology", "title": "Lab/Radiology"  },
                        { "data": "start_other", "title": "Other"  },
                        /*{ "data": "patientCount", "title": "Patient Count"  },*/
                    ];
                    scrollX = false;
                }
                if(category == "home-services-detailed"){
                    columnsData = [
                        { "data": "practice" , "title": "Practice" },
                        { "data": "fname", "title": "First Name" },
                        { "data": "lname" , "title": "Last Name" },
                        { "data": "hName" , "title": "Hospital" },
                        { "data": "dob" , "title": "Date Of Birth" },
                        /*{ "data": "hName" , "title": "Hospital" },*/
                        { "data": "discharge_date", "title": "Discharge Date"  },
                        { "data": "start_home_health", "title": "Home Health"  },
                        { "data": "start_dme", "title": "DME"  },
                        { "data": "start_ptot", "title": "PTOT"  },
                        { "data": "start_oxygen", "title": "Oxygen"  },
                        { "data": "start_lab_radiology", "title": "Lab/Radiology"  },
                        { "data": "start_other", "title": "Other"  },
                    ];
                    scrollX = false;
                }
                displayPatientsData(tableData, columnsData);
            }
		}).catch(function (error) {
			console.error(error, error.response);
		});		

}

var applyFilters = function (category) {
    for (var name in tcmFilters[category].filters) {
        let elem = $(tcmFilters[category].modal).find(`[name="${name}"]`);
        if (elem.attr("type") == "checkbox")
        tcmFilters[category].tcmFilters[name] = elem.prop("checked");
        else
        tcmFilters[category].tcmFilters[name] = elem.val() || null;
    }
    fetch(category);
    $(tcmFilters[category].modal).modal("hide");
};

/**
 * Update the displayed record count
 */
var updateRecordCount = function () {
    var records = Object.keys(table("tcm_reports").filteredData()).length;
    $("#records").html(`Total Records: ${records}`);
};

/**
 * Invoked when a row in the table is clicked
 */
var onRowClick = function (row) {
    window.open(actionUrl + row.id, "_blank");
};


var displayPatientsData = function(tableData, columnData = []) {

    patientsDataTable = $("<table id='patients' class='table table-striped bg-white table-hover table-cursor-pointer no-footer'><tbody></tbody></table>"); // Insert here thead and tbody if really necessary.
    $("#pdatatableContent").html(patientsDataTable);
	 if ($.fn.dataTable.isDataTable('#patients')) {
                 $('#patients').DataTable().clear().destroy();               
            }
			
	var table = patientsDataTable.DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "scrollX": scrollX,
        "destroy": true,       
        "responsive": true,
		"data": tableData,
        'info': true,
		"columns":columnData,
		"order": [[ 1, "desc" ]],
		"Language": {
			"EmptyTable": "No Patients Found for given filter"
        },
    });

    var tableCount = $('#patients').dataTable();
    $('#count').val(tableCount.fnGetData().length);
    
    $('#print_button').removeAttr('hidden');
};

    var fetchFilters = function(){
        var category = $("#reports-category").val();
        var practice = $("#practice").val();
        var hospital = $("#hospital").val();
        var dateStart = $("#date-start").val();
        var dateEnd = $("#date-end").val();
        dataString = JSON.stringify({'reportsCategory': category, 'practice':practice, 'hospital':hospital, 'dateStart':dateStart, 'dateEnd':dateEnd});
        return dataString;
    }

    var dateFilters = function(){
        var today = 0;
        try{
              if($("#type").val() == "MTD")
            {
              var now = new Date();
              var d1 = "01";
              var m1 = ("0" + (now.getMonth() + 1)).slice(-2);
              var strtdt = `${now.getUTCFullYear()}-${m1}-${d1}`;
    
              var d2 = ("0" + now.getDate()).slice(-2);
              var m2 = ("0" + (now.getMonth() + 1)).slice(-2);
              var enddt = `${now.getUTCFullYear()}-${m2}-${d2}`;
             
    
              $('#date-start').attr("readonly", true); 
              $('#date-end').attr("readonly", true); 
            }
            else if($("#type").val() == "YTD")
            {
              var now = new Date();
              var d1 = "01";
              var m1 = "01";
              var strtdt = `${now.getUTCFullYear()}-${m1}-${d1}`;
    
              var d2 = ("0" + now.getDate()).slice(-2);
              var m2 = ("0" + (now.getMonth() + 1)).slice(-2);
              var enddt = `${now.getUTCFullYear()}-${m2}-${d2}`;
    
              $('#date-start').attr("readonly", true); 
              $('#date-end').attr("readonly", true); 
            
            }
            else if($("#type").val() == "Date-Range")
            {
              $('#date-start').removeAttr("readonly",false); 
              $('#date-end').removeAttr("readonly"); 
            }
        }
        catch (e){
          console.warn(e)
        }
        $("#date-start").val(strtdt);
        $("#date-end").val(enddt);  
    }; 

var init = function () {
   
    $("#keywords").keyup(function () {
        table("tcm_reports").setKeywordFilter($(this).val(), updateRecordCount);
    });
    $("#date-start").change(function () {
        table("tcm_reports").setDateFilter($(this).val(), $("#date-end").val(), updateRecordCount);
    });
    $("#date-end").change(function () {
        table("tcm_reports").setDateFilter($("#date-start").val(), $(this).val(), updateRecordCount);
    });
    $("#reports-category").change(function () {
        if ($(this).val()) {
            $("#filter-button").prop("disabled", false).attr("data-target", tcmFilters[$(this).val()].modal);
            tcmReports.fetch($(this).val());
        } else {
            $("#filter-button").prop("disabled", true);
        }
    });
    table("tcm_reports").click(onRowClick);
    $("[name='tcm_admit_discharge_admission_facility_type_filter']").submit(function () {
        applyFilters("admission-facility-type");
        return false;
    });
    $("[name='tcm_admit_discharge_discharge_to_detail_filter']").submit(function () {
        applyFilters("discharged-to-detail");
        return false;
    });
    $("[name='tcm_admit_discharge_discharge_to_filter']").submit(function () {
        applyFilters("discharged-to");
        return false;
    });
    $("[name='tcm_readmission_filter']").submit(function () {
        applyFilters("readmission");
        return false;
    });
    $("[name='tcm_readmission_filter']").submit(function () {
        applyFilters("readmission-detail");
        return false;
    });
    $("[name='tcm_patient_contact_initial_contact_missed_filter']").submit(function () {
        applyFilters("initial-contact-missed-untimely");
        return false;
    });
    $("[name='tcm_billable_by_hospital_group_filter']").submit(function () {
        applyFilters("by-hospital-group-billable");
        return false;
    });
    $("[name='tcm_billable_by_hospital_detail_filter']").submit(function () {
        applyFilters("by-hospital-group-billable-detail");
        return false;
    });
    $("[name='tcm_med-reconciliation-outcome_type_filter']").submit(function () {
        applyFilters("med-reconciliation-outcome");
        return false;
    });
    $("[name='tcm_med_reconciliation_outcome_detail_type_filter']").submit(function () {
        applyFilters("med-reconciliation-outcome-detail");
        return false;
    });
    $("[name='tcm_med_rec_compliance_issues_filter']").submit(function () {
        applyFilters("med-rec-compliance-issues");
        return false;
    });
    $("[name='tcm_non-billable-outcome-by-group-hostpital_filter']").submit(function () {
        applyFilters("non-billable-outcome-by-group-hostpital");
        return false;
    });
    $("[name='tcm_non-billable-outcome-by-group-hostpital-detailed_filter']").submit(function () {
        applyFilters("non-billable-outcome-by-group-hostpital-detailed");
        return false;
    });
    $("[name='tcm_non-billable-outcome-by-group-hostpital-detailed_filter']").submit(function () {
        applyFilters("home-services");
        return false;
    });

    $("#type").on("change", function(){
        dateFilters();
        fetch($("#date-start").val(),$("#date-end").val(),$("#reports-category").val());
    })
    
    $("#practice").change(function () {
            tcmReports.fetch($(this).val(),$("#reports-category").val());
    });

    $("#hospital").change(function () {
        if ($(this).val()) {
            tcmReports.fetch($(this).val(),$("#reports-category").val());
        } 
    });

    $("#date-start").change(function () {
        if ($(this).val()) {
            tcmReports.fetch($(this).val(),$("#reports-category").val());
        } 
    });

    $("#date-end").change(function () {
        if ($(this).val()) {
            tcmReports.fetch($(this).val(),$("#reports-category").val());
        } 
    });

    
    $("#reports-category").trigger("change");
};

window.tcmReports = {
    fetch: fetch,
    init: init
};
