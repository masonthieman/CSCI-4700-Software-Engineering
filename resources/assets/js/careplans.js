/**
 * Care Plan Templates Page Controller
 * Created by Pranali Patil
 *
 * This module controls all functionality on the care plan tab of the site,
 * including modals, and Ajax requests.
 */

// General Definitions ---------------------------------------------------------

// URLs
const URL_DATA_FETCH = "/ajax/data_care_plan_fetch";

// Store the care plan templates in this structure
var carePlanData = {
    "care_plan_templates": {}
};

// Frontend Manipulation -------------------------------------------------------

/**
 * Clear the Care Plan Templates table
 */
var clearCarePlanTemplates = function () {
    $("#table-care_plan_templates tbody").html("");
};


/**
 * Display the Care Plan Templates in the table
 */
var displayCarePlanTemplates = function() {
    table("care_plan_templates").setData(carePlanData.care_plan_templates);
};

/**
 * Get the Care Plan Templates
 *
 * @param {Function} callback
 */
var fetchCarePlanTemplates = function(callback) {
    $("#care-plan-template-add-button").prop("disabled", true);
    $.get(URL_DATA_FETCH, function(data) {
        carePlanData = data;
        $("#care-plan-template-add-button").prop("disabled", false);
        console.log(carePlanData);
        if (callback)
            callback();
    }).fail(function(error) {
        console.error("Data fetch error:", error);
    });
};

// Ajax GET Requests -----------------------------------------------------------

/**
 * Add a Care Plan Template via Ajax request
 */
var onCarePlanAdd = function(formObj, fields, response) {
    if (response.status == 200) {
        adminData.practices[response.data.id] = response.data;
        displayCarePlanTemplates();
        notify.success("Care Plan Template added successfully!");
        $("#name").val("");
        $("#icd10").val("");
        form.dynamicFormClear("symptoms");
        form.dynamicFormClear("goals");
        form.dynamicFormClear("tasks");
        form.dynamicFormClear("resources");
        form.dynamicFormClear("tracking");
    }
};

/**
 * Populate the practice-edit modal when an edit request has been made
 *
 * @param {Event Object}
 */
var onOpenCarePlanEdit = function (row) {
    var modal = $("#modal-careplan-edit");
    var careplan = carePlanData.care_plan_templates[row.id];
	var base_url = window.location.origin;
	window.open(base_url+`/care-plan/library/templates/edit/${row.id}`, '_blank');

	
    modal.find(".modal-title").text(`Edit Care Plan Template: ${careplan.name + " (" + careplan.icd10 + ")"}`);
    modal.find("[data-value='care_plan_id']").val(careplan.id);
    // modal.find("#practice-edit-status")
    //     .removeClass("is-invalid")
    //     .val(practice.is_active).change();
    modal.find("#print-care-plan").attr("href", `/care_plan/library/templates/printing/${careplan.id}`);
    // form.dynamicFormClear("edit_physicians");
    // practice.physicians.forEach(function(physician) {
    //     form.dynamicFormAdd("edit_physicians", {"name": physician.name});
    // });
    //modal.modal("show");
};

// Generic Functions -----------------------------------------------------------

/**
 * Refresh the employees and practices from the database and display the results
 */
var updateCarePlanTemplates = function () {
    clearCarePlanTemplates();
    table("care_plan_templates").setData({}).setLoading(true);
    fetchCarePlanTemplates(function () {
        table("care_plan_templates").setLoading(false);
        displayCarePlanTemplates();
    });
};

// Initialization --------------------------------------------------------------

/**
 * Initialize the administrator page and register event listeners
 */
var init = function() {

    // Register input event handlers
    $("#care-plan-templates-search").keyup(function () {
        table("care_plan_templates").setKeywordFilter($(this).val());
    });

	var base_url = window.location.origin;
	$("#care-plan-template-add-button").on("click", function(){
		window.open(base_url+`/care-plan/library/templates/create`, '_blank');
	});
    // Register Ajax forms
    //form.ajaxForm("careplan_add", onCarePlanAdd);

    // Open the modals on edit
   table("care_plan_templates").click(onOpenCarePlanEdit);

    // Fetch the list of employees and practices and display them
    updateCarePlanTemplates();
};

// Module Export ---------------------------------------------------------------

// Export the module functions
window.careplans = {
    init: init
};