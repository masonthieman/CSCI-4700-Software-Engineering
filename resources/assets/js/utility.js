/**
 * Filter the given data by searching the given keys for the given value
 *
 * @param  {JSON Object}  data   The given data object to search through
 * @param  {JSON Object}  fields What indices of the object to search through
 * @param  {String}       search The value(s) to search for in the data
 * @return {JSON Object}
 */
var filterValues = function(data, fields, search = "") {
    search = search.toLowerCase().trim();
    let filtered = {};
    let keywords;
    if (search) {
        let re = /\s+/;
        keywords = search.split(re);
        for (let id in data) {
            let include = 1;
            for (var j = 0; j < keywords.length && include; j++) {
                try {
                    for (var k = 0; k < fields.length && !data[id][fields[k]].toLowerCase().includes(keywords[j]); k++)
                    { }
                    include &= k != fields.length;
                } catch (e) {
                    include = 0;
                }
            }
            if (include)
                filtered[id] = data[id];
        }
    } else
        return data;
    return filtered
};

/**
 * Determine if the given argument is an Array
 *
 * @param  {Any}     obj
 * @return {Boolean}
 */
var isArray = function(obj) {
    return Object.prototype.toString.call(obj) === '[object Array]';
};

/**
 * Set the active tab
 *
 * @param {String} tabName
 */
var setActiveTab = function(tabGroup, tab) {
    $(`#tabs-${tabGroup}-${tab}-tab`).tab("show");
};

/**
 * Update the list of physicians to select from
 *
 * @param {Integer}       practiceId
 * @param {jQuery Object} selectElement
 * @param {Integer}       selectedPhysician
 */
var updatePhysicianList = function(practiceId, selectElement, selectedPhysician = null) {
    selectElement.html($("<option>").html("Select Physician"));
    if (!practiceId) {
        return;
    }
    axios({
        method: "GET",
        url: `/ajax/practice/${practiceId}/physicians`,
    }).then(function (response) {
        Object.values(response.data).forEach(function(physician) {
            $("<option>").val(physician.id).html(physician.name).appendTo(selectElement);
        });
        if (selectedPhysician) {
            selectElement.val(selectedPhysician);
        }
    }).catch(function (error) {
        console.error(error, error.response);
    });
};

/* Dropdown for team leader and checking the user type in dashboard */
 checkAdmin = function(){
    axios({
        method: "GET",
        url: `/ajax/dashboard/checkAdmin`,
    }).then(function (response) {
       console.log(response.data);
    }).catch(function (error) {
        console.error(error, error.response);
    });
 }


/**
 * Format the given date into mm/dd/YYYY
 *
 * @param  {Date}   date
 * @return {String}
 */
var formatDate = function(date) {
    var day   = date.getDate()  < 10 ? '0'+(date.getDate())  : date.getDate();
    var month = date.getMonth() < 9  ? '0'+(date.getMonth() + 1) : date.getMonth() + 1;
    return `${month}/${day}/${date.getFullYear()}`;
};



/* Dropdown for team leader and checking the user type in dashboard */


/**
 * Format the given date to work with inputs Y-m-d
 *
 * @param  {Date}   date
 * @return {String}
 */
var dateValue = function(date) {
    var day = date.getDate() < 10 ? '0' + (date.getDate()) : date.getDate();
    var month = date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1;
    return `${date.getFullYear()}-${month}-${day}`;
};
//

//


/* Calculate in business days */
/* var businessDays = function(date){
    var day = ("0" + date.getDate()).slice(-2);
    var month = ("0" + (date.getMonth() + 1)).slice(-2);
   // var year = date.getFullYear();
    var count = date.getDay();
    var full_date = 0;

    if(count == 6)
    {
        day += 2;
        full_date = `${date.getFullYear()}-${month}-${day}`;
    }
    else if(count == 0)
    {
        day += 1;
        full_date = `${date.getFullYear()}-${month}-${day}`;
    }
    else
    {
       full_date = `${date.getFullYear()}-${month}-${day}`;
    }
    $("#initial_contact_required").val(full_date);
}; */

/* Calculate in business days */

var timeDifference = function(date) {
    var timeV = new Date(date);
    var DifMs = Date.now() - timeV.getTime();
    return new Date(DifMs); // miliseconds from epoch
};

var dateCurrent = function()
{
    var currentDate = new Date();
    var day = currentDate.getDate() < 10 ? '0' + (currentDate.getDate()) : currentDate.getDate();
    var month = currentDate.getMonth() < 9 ? '0' + (currentDate.getMonth() + 1) : currentDate.getMonth() + 1;
    return `${day}/${month}/${currentDate.getFullYear()}`;
}

var dateFormatisEmpty = function(date){
var dt = new Date(date);
var day = dt.getDate() == NaN ? '00' : dt.getDate();
var month = dt.getMonth() == NaN ? '00' : dt.getMonth();
var year = date.getFullYear();
    return `${month}/${day}/${dt.getFullYear()}`;
};

var age = function(date) {
    return Math.abs(timeDifference(date).getFullYear() - 1970) || "";

    /* days = Math.floor(date / (1000 * 60 * 60 * 24));
	ageYears = Math.floor(days / 365);
	ageMonths = Math.floor((days % 365) / 31);
	ageDays = days - (ageYears * 365) - (ageMonths * 31);
	ageText = "";
	if (ageYears > 0) {
		ageText = ageText + ageYears + " year";
		if (ageYears > 1) ageText = ageText + "s"; 
	}
	if (ageMonths > 0) {
		if (ageYears > 0) {
			if (ageDays > 0) ageText = ageText + ", "; 
			else if (ageDays == 0) ageText = ageText + " and ";
		}
		ageText = ageText + ageMonths + " month";
		if (ageMonths > 1) ageText = ageText + "s";
	}
	if (ageDays > 0) {
		if ((ageYears > 0) || (ageMonths > 0)) ageText = ageText + " and ";
		ageText = ageText + ageDays + " day";
		if (ageDays > 1) ageText = ageText + "s";
    }
    
    return ageText;  */
    
};

//graph table view data

/* Patient List Functionality 
var patientData = {
    "Patient":    {}
};
var displayPatients = function() {
    var columns = ["fname, mname, lname"];
    var labels  = ["First name", "Middle Name", "Last Name"];
    table("patients").setColumns(columns, labels);
};

var displayPatientsData = function(patientData) {

    table("Patient").setData(patientData.patients);
};

var fetchPatients = function(url) {
      console.log(url);
    $.get(url, function(data) {     
        patientData = data;
        displayPatientsData(patientData);
    }).fail(function(error) {
        console.error("Data fetch error:", error);
    });
};
*/
/* TCM Charts */


    

$(document).ready(function() {
    $(document).on("click", "[data-change-tab]", function() {
        setActiveTab(
            $(this).attr("data-tab-group"),
            $(this).attr("data-change-tab")
            
        );
    });
    $("[name='dob'], #dob").blur(function () {
        $("#age").val(util.age($(this).val()));
    });

});

var updateTodaysDate = function(id, action){
	
    var today = 0;
    try{
      var now = new Date();
      var day = ("0" + now.getDate()).slice(-2);
      var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = `${now.getFullYear()}-${month}-${day}`;
		if(action!='return'){
			
			if($("#"+id).val() == "")
			{
			  $("#"+id).val(today);
			}
		}else{
		return today;
		}
    }
    catch (e){
      console.warn(e)
    }
    //var today = (month) + "/" + (day) + "/" + now.getFullYear();
		
	
};

/* get the max count of patient addl contact attempt for a specific tcm_form_id */
var countAttempt = function(tcmId)
{
    //debugger;
    if (!tcmId) {
            return(false);
        }
    axios({
        method: "GET",
        url: `/ajax/tcm/${tcmId}/patientAttempt`,
    }).then(function (response) {
        $("#count_attempt").val(response.data);
    }).catch(function (error) {
        console.error(error, error.response);
    });
}; 

/* assign id and labels for patient contact attempts */
var dynamicFieldCnt = function(count){
 var cnt = parseInt(count);
  //var cnt = parseInt($("#count_attempt").val());
  //alert(counter);
  //alert(cnt);
  //var nextItem = cnt;
    /* for(var i = 0; i < counter; i++)
    {

    } */
        $("#dynamic_area_count").val(cnt);		
        decOrdinal = decimalToOrdinal(cnt);
        decWord = ordinalInWord(cnt);        
        $("#patient_attempt_"+cnt).html(decWord + " Contact Required By :");
        $("#addl_contact_attempt_label_"+cnt).html(decOrdinal + " Attempt")

     
      //$("#count_attempt").val(cnt);
	
};


/* Convert decimal to ordinal for eg: 1st, 2nd and so on --  added by Deborah on 06-07-2019 */
function decimalToOrdinal(i) {
    var j = i % 10,
        k = i % 100;
    if (j == 1 && k != 11) {
        return i + "st";
    }
    if (j == 2 && k != 12) {
        return i + "nd";
    }
    if (j == 3 && k != 13) {
        return i + "rd";
    }
    return i + "th";
}
/* Convert decimal to ordinal for eg: 1st, 2nd and so on */


/* Convert decimal to ordinal words for eg: First, Second and so on -- added by Deborah on 06-07-2019 */
function ordinalInWord( cardinal ) {
    var ordinals = [ 'Zeroth', 'First', 'Second', 'Third', 'Fourth', 'Fifth' , 'Sixth' ,
     'Seventh' , 'Eighth' , 'Ninth' , 'Tenth','Eleventh', 'Twelveth' , 'Thirteenth' , 
     'Fourteenth' , 'Fifteenth' , 'Sixteenth' , 'Seventeenth' , 'Eighteenth' , 'Nineteenth' ,
      'Twentieth'/* and so on up to "twentieth" */ ];
    var tens = {
        20: 'twenty',
        30: 'thirty',
        40: 'forty' /* and so on */
    };
    var ordinalTens = {
        30: 'thirtieth',
        40: 'fortieth',
        50: 'fiftieth'
    };

    if( cardinal <= 20 ) {                    
        return ordinals[ cardinal ];
    }
    
    if( cardinal % 10 === 0 ) {
        return ordinalTens[ cardinal ];
    }
    
    return tens[ cardinal - ( cardinal % 10 ) ] + ordinals[ cardinal % 10 ];
}
/* Convert decimal to ordinal words for eg: First, Second and so on */



//TCM Dashboard

/* TCM Charts */

/* Donut Chart */

/* Initial Contact Due Today Status */
var initialContactVariables = function(){
    // debugger; 
        axios({
            method: "GET",
            url: `/ajax/tcmdashboard/initialContactChart`,
        }).then(function (response) {
            //$("#hdnInitial").val(response.data);
            var donutVariables = response.data.count;
            //alert(response.data.count[0]);
            var ctx = $("#dashboard-chart-initial-contact-status").get(0).getContext("2d");
            var donut = new Chart(ctx, {
              type: 'doughnut',
              data: {
                labels: response.data.labels,
                datasets: [{
                	data : [20, 30],
                  //data: [response.data.count[0], response.data.count[1]],
                  //data: response.data.count,
                  backgroundColor: ['#4e73df', '#1cc88a'],
                  hoverBackgroundColor: ['#2e59d9', '#17a673'],
                  hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
              },
              options: {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                  display: false
                },
                cutoutPercentage: 20,
              },
            }); 

        }).catch(function (error) {
            console.error(error, error.response);
        });
    }; 

/* Second Contact Due Today Status */
var secondContactVariables = function(){
        axios({
            method: "GET",
            url: `/ajax/tcmdashboard/secondContactChart`,
        }).then(function (response) {
            //$("#hdnInitial").val(response.data);
            var donutVariables = response.data.count;
            //alert(response.data.count[0]);
            var ctx = $("#dashboard-chart-second-contact-status").get(0).getContext("2d");
            var donut = new Chart(ctx, {
              type: 'doughnut',
              data: {
                labels: response.data.labels,
                datasets: [{
                	data : [50, 30],
                  //data: [response.data.count[0], response.data.count[1]],
                  //data: response.data.count,
                  backgroundColor: ['#4e73df', '#1cc88a'],
                  hoverBackgroundColor: ['#2e59d9', '#17a673'],
                  hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
              },
              options: {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                  display: false
                },
                cutoutPercentage: 20,
              },
            }); 

        }).catch(function (error) {
            console.error(error, error.response);
        });
    }; 

/* TCM Patients */
var tcmPatientVariables = function(){
        axios({
            method: "GET",
            url: `/ajax/tcmdashboard/tcmPatientStatusChart`,
        }).then(function (response) {
            //$("#hdnInitial").val(response.data);
            var donutVariables = response.data.count;
            //alert(response.data.count[0]);
            var ctx = $("#dashboard-chart-tcm-patients-status").get(0).getContext("2d");
            var donut = new Chart(ctx, {
              type: 'doughnut',
              data: {
                labels: response.data.labels,
                datasets: [{
                	//data : [20, 30, 50],
                  //data: [[response.data.count[0], response.data.count[1]],
                  data: response.data.count,
                  backgroundColor: ['#4e73df', '#1cc88a','#F0B27A'],
                  hoverBackgroundColor: ['#2e59d9', '#17a673','#BA4A00'],
                  hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
              },
              options: {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                  display: false
                },
                cutoutPercentage: 20,
              },
            }); 

        }).catch(function (error) {
            console.error(error, error.response);
        });
    }; 

/* Donut Chart */

/* Bar Graph */
var taskDueTodayVariables = function(){
        axios({
            method: "GET",
            url: `/ajax/tcmdashboard/tcmTaskDueTodayChart`,
        }).then(function (response) {
            var ctx = $("#dashboard-chart-tasks-due-today").get(0).getContext("2d");
            var donut = new Chart(ctx, {
              type: "bar",
	       	  data: {
		           labels: response.data.labels,
		           datasets: [
		               {
		                   data: response.data.count,
		                  // data : [[response.data.count[0],[response.data.count[1],[response.data.count[2]],
		                   backgroundColor: ['rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)'],
		                   borderColor: ['rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)'],
		                   borderWidth: 1
		               }
		           ],
		       },
	       	  options: {
	       	  	scales: { 
			       yAxes: [{ 
			           ticks: { 
			               beginAtZero:true 
			           } 
			       }] 
			   } ,
			   //onClick: graphClickEvent
	       	  }
            }); 

        }).catch(function (error) {
            console.error(error, error.response);
        });
    }; 

   /* function graphClickEvent(event, array){
	    if(array[0]){
	    alert("HI");
	    }
	} */

var faceToFaceDueThisWeekVariables = function(){
        axios({
            method: "GET",
            url: `/ajax/tcmdashboard/tcmfaceToFaceDueThisWeekChart`,
        }).then(function (response) {
            var ctx = $("#dashboard-chart-face-to-face-due-this-week").get(0).getContext("2d");
            var donut = new Chart(ctx, {
              type: "bar",
	       	  data: {
		           labels: response.data.labels,
		           datasets: [
		               {
		                   data: response.data.count,
		                   //data : [20, 10, 30, 15, 10, 2, 1],
		                   backgroundColor: ['rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)'],
		                   borderColor: ['rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)'],
		                   borderWidth: 1
		               }
		           ],
		       },
	       	  options: {
	       	  	scales: { 
			       yAxes: [{ 
			           ticks: { 
			               beginAtZero:true 
			           } 
			       }] 
			   } ,
			  // onClick: graphClickEvent
	       	  }
            }); 

        }).catch(function (error) {
            console.error(error, error.response);
        });
    }; 
  /* Bar Graph */

/* TCM Charts */


var checkAdmin = function(){
    axios({
        method: "GET",
        url: `/ajax/dashboard/checkAdmin`,
    }).then(function (response) {
       // console.log(response.data);
    }).catch(function (error) {
        // console.error(error, error.response);
    });
 }




var check = function(){
  var id=$("#hiddenid").val();
    var title_id = $("#identify").val();
  if(title_id=='9'){
     $(".teamleader_id_text").css('display','block');
     $("#caremanager_id").css('display','block')
      if($(".teamleader_id_text").is(":visible")){
        axios({
            method: "GET",
            url: `/ajax/dashboard/${id}/fetchTeamLeader`,
          }).then(function (response){ 
              var drop = $("#caremanager_id");
              drop.empty();
              drop.append($("<option></option>").attr("value", '').text("Please Select"));
              Object.values(response.data).forEach(function(careData) {
              drop.append($("<option></option>").attr("value", careData.employeeid).text(careData.firstname + " " + careData.lastname));
          });
        }).catch(function (error) {
            console.error(error, error.response);
        }); 
    }
    }else if(title_id=='3'){
        $("#selectd").css('display','none');
          $("#caremanager_id").css('display','none')
          $(".caremngr_id_text").css('display','block');
      }else{
        $("#selectd").css('display','block');
    } 
}
 teamLeader = function(id){
    axios({
      method: "GET",
      url: `/ajax/dashboard/${id}/fetchTeamLeader`,
    }).then(function (response){ 
        var drop = $("#caremanager_id");
        drop.empty();
        drop.append($("<option></option>").attr("value", '').text("Select Care Manager"));
        Object.values(response.data).forEach(function(careData) {
        //alert(careData.employeeid);
        drop.append($("<option></option>").attr("value", careData.employeeid).text(careData.firstname + " " + careData.lastname));
    });
        }).catch(function (error) {
            console.error(error, error.response);
        });
  }


 careManager = function(id){
    axios({
        method: "GET",
        url: `/ajax/dashboard/${id}/fetchCareManager`,
    }).then(function (response) {
        Object.values(response.data).forEach(function(practiceData) {
        // alert(practiceData.firstname);
            //$('#txt_first').val(practiceData.firstname);
            //$("<option>").val(practiceData.firstname).html(practiceData.lastname).appendTo(selectElement);
       });
    }).catch(function (error) {
        console.error(error, error.response);
    });
 }



// Export the module
window.util = {
    dateValue          : dateValue,
    filterValues       : filterValues,
    updatePhysicianList: updatePhysicianList,
    formatDate         : formatDate,
    isArray            : isArray,
    setActiveTab       : setActiveTab,
    timeDifference     : timeDifference,
    age                : age,
	updateTodaysDate:updateTodaysDate,
    dateCurrent  : dateCurrent,
    
    careManager : careManager,
    
    teamLeader:teamLeader,
    checkAdmin:checkAdmin,
    check:check,
    countAttempt : countAttempt,
    dynamicFieldCnt : dynamicFieldCnt,
    //bar graph
   
}; 