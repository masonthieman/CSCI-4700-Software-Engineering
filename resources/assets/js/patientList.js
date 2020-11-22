// URLs
const URL_DATA_FETCH = "/ajax/dashboard/fetchPatients";

// Store the employees and practices in this structure
var patientData = {
    "patients":    {}
};
var displayPatients = function() {
    var columns = ["fname, mname, lname"];
    var labels  = ["First name", "Middle Name", "Last Name"];
    table("patients").setColumns(columns, labels);
};

var displayPatientsData = function(patientData) {
	debugger;
    table("patients").setData(patientData.patients);
};

/* var fetchPatients = function() {
    $.get(URL_DATA_FETCH, function(data) {
		debugger;
        patientData = data;
		console.log(patientData);
		displayPatientsData(patientData);
    }).fail(function(error) {
        console.error("Data fetch error:", error);
    });
}; */

var fetchPatients = function(type){
//debugger;
    axios({
        method: "GET",
        url: `/ajax/dashboard/${type}/fetchPatients`,
    }).then(function (response) {
        //alert(response.data);
        patientData = response.data;
        displayPatientsData(patientData);
    }).catch(function (error) {
        console.error(error, error.response);
    });
};

var init = function(data) {
    fetchPatients();
};

window.patientList = {
	init: init,
    fetchPatients : fetchPatients
};